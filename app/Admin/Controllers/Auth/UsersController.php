<?php
#app/Http/Admin/Controllers/Auth/UsersController.php
namespace App\Admin\Controllers\Auth;

use App\Admin\Admin;
use App\Admin\Models\AdminPermission;
use App\Admin\Models\AdminRole;
use App\Admin\Models\AdminUser;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller
{
    public $lang;

    public function __construct()
    {
        $this->lang = app()->getLocale();

    }

    public function index()
    {
        $data = [
            'title' => trans('user.admin.list'),
            'sub_title' => '',
            'icon' => 'fa fa-indent',
            'menu_left' => '',
            'menu_right' => '',
            'menu_sort' => '',
            'script_sort' => '',
            'menu_search' => '',
            'script_search' => '',
            'listTh' => '',
            'dataTr' => '',
            'pagination' => '',
            'result_items' => '',
            'url_delete_item' => '',
        ];

        $sort_order = request('sort_order') ?? 'id_desc';
        $keyword = request('keyword') ?? '';
        $arrSort = [
            'id__desc' => 'ID DESC',
            'id__asc' => 'ID ASC',
            'username__desc' => 'Name login DESC',
            'username__asc' => 'Name login ASC',
            'name__desc' => 'Name DESC',
            'name__asc' => 'Name ASC',
        ];
        $obj = new AdminUser;

        if ($keyword) {
            $obj = $obj->whereRaw('(id = ' . (int)$keyword . '  OR name like "%' . $keyword . '%" OR username like "%' . $keyword . '%"  )');
        }
        if ($sort_order && array_key_exists($sort_order, $arrSort)) {
            $field = explode('__', $sort_order)[0];
            $sort_field = explode('__', $sort_order)[1];
            $obj = $obj->orderBy($field, $sort_field);

        } else {
            $obj = $obj->orderBy('id', 'desc');
        }
        $dataTmp = $obj->paginate(20);

        $dataTr = [];
        foreach ($dataTmp as $key => $row) {
            $showRoles = '';
            if ($row['roles']->count()) {
                foreach ($row['roles'] as $key => $rols) {
                    $showRoles .= '<span class="label label-success">' . $rols->name . '</span> ';
                }
            }
            $showPermission = '';
            if ($row['permissions']->count()) {
                foreach ($row['permissions'] as $key => $p) {
                    $showPermission .= '<span class="label label-success">' . $p->name . '</span> ';
                }
            }
            $dataTr[] = [
                'check_row' => '<input type="checkbox" class="grid-row-checkbox" data-id="' . $row['id'] . '">',
                'id' => $row['id'],
                'username' => $row['username'],
                'name' => $row['name'],
                'roles' => $showRoles,
                'permission' => $showPermission,
                'created_at' => $row['created_at'],
                'action' => '<a href="' . route('admin_user.edit', ['id' => $row['id']]).'"><span title="' . trans('user.admin.edit') . '" type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></span></a>&nbsp;
                    ' . ((Admin::user()->id == $row['id'] || in_array($row['id'], SC_GUARD_ADMIN)) ? '' : '<span onclick="deleteItem(' . $row['id'] . ');"  title="' . trans('admin.delete') . '" class="btn btn-flat btn-danger btn-xs"><i class="fa fa-trash"></i></span>')
                ,
            ];
        }

        $data['dataTr'] = $dataTr;
        $data['pagination'] = $dataTmp->appends(request()->except(['_token', '_pjax']))->links('admin.component.pagination');
        $data['result_items'] = trans('user.admin.result_item', ['item_from' => $dataTmp->firstItem(), 'item_to' => $dataTmp->lastItem(), 'item_total' => $dataTmp->total()]);

        $data['arrSort'] = $arrSort;
        $data['sort_order'] = $sort_order;
        $data['keyword'] = $keyword;

        $data['url_delete_item'] = route('admin_user.delete');

        return view('admin.user.list')->with($data);
    }

    /**
     * Form create new order in admin
     * @return [type] [description]
     */
    public function create()
    {
        $data = [
            'title' => trans('user.admin.add_new_title'),
            'sub_title' => '',
            'title_description' => trans('user.admin.add_new_des'),
            'icon' => 'fa fa-plus',
            'user' => [],
            'roles' => (new AdminRole)->pluck('name', 'id')->all(),
            'permission' => (new AdminPermission)->pluck('name', 'id')->all(),
            'url_action' => route('admin_user.create'),

        ];

        return view('admin.user.edit')
            ->with($data);
    }

    /**
     * Post create new order in admin
     * @return [type] [description]
     */
    public function postCreate()
    {
        $data = request()->all();
        $dataOrigin = request()->all();
        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:100',
            'username' => 'required|regex:/(^([0-9A-Za-z@\._]+)$)/|unique:admin_user,username|string|max:100|min:3',
            'avatar' => 'nullable|string|max:255',
            'password' => 'required|string|max:60|min:6|confirmed',
        ], [
            'username.regex' => trans('user.username_validate'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataInsert = [
            'name' => $data['name'],
            'username' => strtolower($data['username']),
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
        ];

        $user = AdminUser::createUser($dataInsert);

        $roles = $data['roles'] ?? [];
        $permission = $data['permission'] ?? [];
        //Insert roles
        if ($roles) {
            $user->roles()->attach($roles);
        }
        //Insert permission
        if ($permission) {
            $user->permissions()->attach($permission);
        }

        return redirect()->route('admin_user.index')->with('success', trans('user.admin.create_success'));

    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $user = AdminUser::find($id);
        if ($user === null) {
            return 'no data';
        }
        $data = [
            'title' => trans('user.admin.edit'),
            'sub_title' => '',
            'title_description' => '',
            'icon' => 'fa fa-pencil-square-o',
            'user' => $user,
            'roles' => (new AdminRole)->pluck('name', 'id')->all(),
            'permission' => (new AdminPermission)->pluck('name', 'id')->all(),
            'url_action' => route('admin_user.edit', ['id' => $user['id']]),
        ];
        return view('admin.user.edit')
            ->with($data);
    }

    /**
     * update status
     */
    public function postEdit($id)
    {
        $user = AdminUser::find($id);
        $data = request()->all();
        $dataOrigin = request()->all();
        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:100',
            'username' => 'required|regex:/(^([0-9A-Za-z@\._]+)$)/|unique:admin_user,username,' . $user->id . '|string|max:100|min:3',
            'avatar' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:60|min:6|confirmed',
        ], [
            'username.regex' => trans('user.username_validate'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
//Edit

        $dataUpdate = [
            'name' => $data['name'],
            'username' => strtolower($data['username']),
            'avatar' => $data['avatar'],
        ];
        if ($data['password']) {
            $dataUpdate['password'] = bcrypt($data['password']);
        }
        AdminUser::updateInfo($dataUpdate, $id);
        $roles = $data['roles'] ?? [];
        $permission = $data['permission'] ?? [];
        $user->roles()->detach();
        $user->permissions()->detach();
        //Insert roles
        if ($roles) {
            $user->roles()->attach($roles);
        }
        //Insert permission
        if ($permission) {
            $user->permissions()->attach($permission);
        }

//
        return redirect()->route('admin_user.index')->with('success', trans('user.admin.edit_success'));

    }

    /*
    Delete list Item
    Need mothod destroy to boot deleting in model
     */
    public function deleteList()
    {
        if (!request()->ajax()) {
            return response()->json(['error' => 1, 'msg' => 'Method not allow!']);
        } else {
            $ids = request('ids');
            $arrID = explode(',', $ids);
            $arrID = array_diff($arrID, SC_GUARD_ADMIN);
            AdminUser::destroy($arrID);
            return response()->json(['error' => 1, 'msg' => '']);
        }
    }

}
