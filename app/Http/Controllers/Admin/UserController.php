<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User as MainModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest as MainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Config;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.user.';
    protected $controllerName ='user';
    protected $model;
    protected $params=[];
    protected $status_for_controller = [];
    protected $status_templates = [];
    protected $search_field_for_controller = [];
    protected $search_field_templates = [];
    // protected $level_for_controller = [];
    // protected $level_templates = [];

    public function __construct() {
        $this->model = new MainModel();
        $this->params['item_per_page'] = 3;
        $this->params['status_for_controller'] = Config::get('linh_config.config.status.'.$this->controllerName, 'default');
        $this->params['status_templates'] = Config::get('linh_config.template.status');
        // $this->params['level_for_controller'] = Config::get('linh_config.config.level.'.$this->controllerName, 'default');
        // $this->params['level_templates'] = Config::get('linh_config.template.level');
        $this->params['search_field_for_controller'] = Config::get('linh_config.config.search.'.$this->controllerName, 'default');
        $this->params['search_field_templates'] = Config::get('linh_config.template.search');
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        if(!Gate::allows('user.view')){
            return redirect('/no-permission');
        }else{
            $this->params['filter_status'] = (in_array($request->input('filter_status'),$this->params['status_for_controller'])? $request->input('filter_status','all') : 'all');
            // $this->params['filter_level'] = (in_array($request->input('filter_level'),$this->params['level_for_controller'])? $request->input('filter_level','all') : 'all');
            $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
            $this->params['search_value'] = $request->input('search_value','');
            $status_counts = $this->model->countByStatus($this->params,['task'=>'admin_count_status']);
            $roles = $this->model->getAllRoles();
            $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
            return view($this->pathViewName.'index',compact('items','status_counts','roles'))->with("params",$this->params);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function changeStatus(Request $request)
    {
        if(!Gate::allows('user.change_status')){
            return redirect('/no-permission');
        }else{
            $id = $request->id;
            $status = $request->status;
            if($status =='default'){
                    $status = 'active';
            }
            $this->model->updateItem(['id'=> $id,'status'=> $status],['task'=>'admin_change_status']);
            return redirect()->back()->with('notify', 'Kích hoạt trạng thái thành công');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showFormAdd(Request $request)
    {
        if(!Gate::allows('user.add')){
            return redirect('/no-permission');
        }else{
            $roles = $this->model->getAllRoles();
            return view($this->pathViewName.'form_add',compact('roles'));
        }
    }

    public function showProfile(Request $request)
    {
        if(!Gate::allows('user.show_profile')){
            return redirect('/no-permission');
        }
        return view($this->pathViewName.'profile');
    }

    public function showFormEdit(Request $request)
    {
        if(!Gate::allows('user.edit')){
            return redirect('/no-permission');
        }else{
            $id = $request->id;
            $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id)
            // dd($item);
            return view($this->pathViewName.'form_edit', compact('item'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function save(MainRequest $request)
    {
        if(!Gate::allows('user.save')){
            return redirect('/no-permission');
        }else{
            if($request->method() == 'POST'){
                $params = $request->all();   
                
                if(!empty($request->id)){
                    $this->model->updateItem($params,['task'=>'admin_edit_item']);
                    $notify = "Chỉnh Sửa Thông Tin Thành Công";
                    return redirect()->back()->with('notify', 'Thay đổi thông tin người dùng thành công');
                }else{
                    $params['thumb'] = $request->file('thumb');
                    // dd($params) ;
                    // die();
                    $this->model->insertItem($params,['task'=>'admin_add_new_item']);
                    $notify = "Thêm Mới Thành Công";
                    return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
                }
                
            }
        }    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request)
    {
        if(!Gate::allows('user.delete')){
            return redirect('/no-permission');
        }else{
            $id = $request->id;
            $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
            $this->model->deleteItem($item,['task'=>'admin_delete_item']);
            $notify = "Xóa Thành Công";
            return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
        }    
    }

    public function changePassword(MainRequest $request){
        if(!Gate::allows('user.edit')){
            return redirect('/no-permission');
        }else{
            if($request->method() == "POST" ){
                $params = $request->all();
                // dd($params);
                $this->model->updateItem($params,['task' =>'change-password']);
                return redirect()->route($this->controllerName.'.index')->with('notify', 'Đổi mật khẩu thành công');
            }
        }    
    }

    public function changeRole(Request $request)
    {
        if(!Gate::allows('user.change_role')){
            return redirect('/no-permission');
        }else{
            $role_id = $request->role_id;
            // dd($role_id);
            $id = $request->id;
            $this->model->updateItem(['id'=> $id,'role_id'=> $role_id],['task'=>'admin_change_role']);
            return redirect()->back()->with('notify', 'Thay đổi vai trò thành công');
        }    
       
    }
    
    
}
