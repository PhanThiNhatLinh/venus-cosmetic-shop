<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Permission as MainModel;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionFormRequest as MainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Config;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.permission.';
    protected $controllerName ='permission';
    protected $model;
    protected $params=[];
    protected $search_field_for_controller = [];
    protected $search_field_templates = [];
    protected $modules = [];
    protected $modules_templates = [];
    protected $permission_templates = [];

    public function __construct() {
        $this->model = new MainModel();
        $this->params['item_per_page'] = 8;
        $this->params['search_field_for_controller'] = Config::get('linh_config.config.search.'.$this->controllerName, 'default');
        $this->params['search_field_templates'] = Config::get('linh_config.template.search');
        $this->params['modules'] = Config::get('linh_config.config.module.'.$this->controllerName, 'default');
        $this->params['modules_templates'] = Config::get('linh_config.template.module', 'default');
        $this->params['permission_templates'] = Config::get('linh_config.template.permission', 'default');
        // dd($this->params['permission_templates']);
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        if(!Gate::allows('permission.view')){
            return redirect('/no-permission');
        }
        $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
        $this->params['search_value'] = $request->input('search_value','');
        $this->params['modules_field'] = (in_array($request->input('modules_field'),$this->params['modules'])? $request->input('modules_field') : 'all');
        
        $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
        // dd($items);
        return view($this->pathViewName.'index',compact('items'))->with("params",$this->params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showFormAdd(Request $request)
    {
        if(!Gate::allows('permission.add')){
            return redirect('/no-permission');
        }
        return view($this->pathViewName.'form_add');
    }

    public function showFormEdit(Request $request)
    {
        if(!Gate::allows('permission.edit')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id)
        // dd($item);
        return view($this->pathViewName.'form_edit', compact('item'));
    }

    /**
     * Display the specified resource.
     */
    public function save(MainRequest $request)
    {
        if(!Gate::allows('permission.save')){
            return redirect('/no-permission');
        }
        if($request->method() == 'POST'){
            $params = $request->all();        
            // dd($params);  
            $params['slug'] = $params['permission_area'].".".$params['permission_name'];
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
        if(!Gate::allows('permission.delete')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
        $this->model->deleteItem($item,['task'=>'admin_delete_item']);
        $notify = "Xóa Thành Công";
        return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
    }

}
