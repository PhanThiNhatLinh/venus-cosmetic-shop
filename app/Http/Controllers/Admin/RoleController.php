<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Role as MainModel;
use Illuminate\Http\Request;
use App\Http\Requests\RoleFormRequest as MainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission; 
use Config;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.role.';
    protected $controllerName ='role';
    protected $model;
    protected $params=[];
    protected $search_field_for_controller = [];
    protected $search_field_templates = [];

    public function __construct() {
        $this->model = new MainModel();
        $this->params['item_per_page'] = 3;
        $this->params['search_field_for_controller'] = Config::get('linh_config.config.search.'.$this->controllerName, 'default');
        $this->params['search_field_templates'] = Config::get('linh_config.template.search');
        
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        if(!Gate::allows('role.view')){
            return redirect('/no-permission');
        }
        $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
        $this->params['search_value'] = $request->input('search_value','');        
        $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
        return view($this->pathViewName.'index',compact('items'))->with("params",$this->params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showFormAdd(Request $request)
    {
        if(!Gate::allows('role.add')){
            return redirect('/no-permission');
        }
        $permissions = $this->model->getAllPermission();
        return view($this->pathViewName.'form_add', compact('permissions'));
    }

    public function showFormEdit(Request $request)
    {
        if(!Gate::allows('role.edit')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id)
        $permissions = $this->model->getAllPermission();
        //lấy permission_id của bảng permission thông qua bảng role để xem vai trò này có những quyền gì
        $role_permissions_id = $item->permission->pluck('id')->toArray();
        // dd($role_permissions_id);
        return view($this->pathViewName.'form_edit', compact('item','permissions','role_permissions_id'));
    }

    /**
     * Display the specified resource.
     */
    public function save(MainRequest $request)
    {
        if(!Gate::allows('role.save')){
            return redirect('/no-permission');
        }
        if($request->method() == 'POST'){
            $params = $request->all();        
            // dd($params);    
            if(!empty($request->id)){
                $this->model->updateItem($params,['task'=>'admin_edit_item']);
                $notify = "Chỉnh Sửa Thông Tin Thành Công";
            }else{
                $this->model->insertItem($params,['task'=>'admin_add_new_item']);
                $notify = "Thêm Mới Thành Công";
            }
            return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request)
    {
        if(!Gate::allows('role.delete')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
        $this->model->deleteItem($item,['task'=>'admin_delete_item']);
        $notify = "Xóa Thành Công";
        return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
    }

}
