<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category as MainModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest as MainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Config;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.category.';
    protected $controllerName ='category';
    protected $model;
    protected $params=[];
    protected $status_for_controller = [];
    protected $status_templates = [];
    protected $display_for_controller = [];
    protected $display_templates = [];
    protected $search_field_for_controller = [];
    protected $search_field_templates = [];

    public function __construct() {
        $this->model = new MainModel();
        $this->params['item_per_page'] = 3;
        $this->params['status_for_controller'] = Config::get('linh_config.config.status.'.$this->controllerName, 'default');
        $this->params['status_templates'] = Config::get('linh_config.template.status');
        $this->params['display_for_controller'] = Config::get('linh_config.config.display.'.$this->controllerName, 'default');
        $this->params['display_templates'] = Config::get('linh_config.template.display');
        $this->params['search_field_for_controller'] = Config::get('linh_config.config.search.'.$this->controllerName, 'default');
        $this->params['search_field_templates'] = Config::get('linh_config.template.search');
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        if(!Gate::allows('category.view')){
            return redirect('/no-permission');
        }else{
            $this->params['filter_status'] = (in_array($request->input('filter_status'),$this->params['status_for_controller'])? $request->input('filter_status','all') : 'all');
            $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
            $this->params['search_value'] = $request->input('search_value','');
            $this->params['filter_display'] = (in_array($request->input('display_field'),$this->params['display_for_controller'])? $request->input('display_field','all') : 'all');
            $status_counts = $this->model->countByStatus($this->params,['task'=>'admin_count_status']);
            $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
            // dd($items);
            return view($this->pathViewName.'index',compact('items','status_counts'))->with("params",$this->params);
        }    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function changeStatus(Request $request)
    {
        if(!Gate::allows('category.change_status')){
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
    //display in home or not
    public function changeDisplay(Request $request)
    {
        if(!Gate::allows('category.change_display')){
            return redirect('/no-permission');
        }else{
            $id = $request->id;
            $display = $request->display;
            if($display =='default'){
                $display = 'yes';
            }
            $this->model->updateItem(['id'=> $id,'display'=> $display],['task'=>'admin_change_display']);
            return redirect()->back()->with('notify', 'Kích hoạt trạng thái hiển thị thành công');
        }    
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showFormAdd(Request $request)
    {
        if(!Gate::allows('category.add')){
            return redirect('/no-permission');
        }else{
            return view($this->pathViewName.'form_add');
        }    
    }

    public function showFormEdit(Request $request)
    {
        if(!Gate::allows('category.edit')){
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
        if(!Gate::allows('category.save')){
            return redirect('/no-permission');
        }else{
            if($request->method() == 'POST'){
                $params = $request->all();        
                // dd($params);    
                if(!empty($request->id)){
                    $this->model->updateItem($params,['task'=>'admin_edit_item']);
                    $notify = "Chỉnh Sửa Thông Tin Thành Công";
                }else{
                    $params['thumb'] = $request->file('thumb');
                    $this->model->insertItem($params,['task'=>'admin_add_new_item']);
                    $notify = "Thêm Mới Thành Công";
                }
                return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
            }
        }    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request)
    {
        if(!Gate::allows('category.delete')){
            return redirect('/no-permission');
        }else{
            $id = $request->id;
            $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
            $this->model->deleteItem($item,['task'=>'admin_delete_item']);
            $notify = "Xóa Thành Công";
            return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
        }    
    }

}
