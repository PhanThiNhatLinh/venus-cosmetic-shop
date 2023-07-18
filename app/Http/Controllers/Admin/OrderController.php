<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Gloudemans\Shoppingcart\Facades\Cart;

use Redirect;
use Config;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.order.';
    protected $controllerName ='order';
    protected $model;
    protected $params=[];
    protected $search_field_for_controller = [];
    protected $search_field_templates = [];

    public function __construct() {
        $this->model = new MainModel();
        $this->params['item_per_page'] = 3;
        $this->params['search_field_for_controller'] = Config::get('linh_config.config.search.'.$this->controllerName, 'default');
        $this->params['search_field_templates'] = Config::get('linh_config.template.search');
        $this->params['status_for_order_controller'] = Config::get('linh_config.config.status.'.$this->controllerName, 'default');
        $this->params['status_order_templates'] = Config::get('linh_config.template.status');
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        // if(!Gate::allows('role.view')){
        //     return redirect('/no-permission');
        // }
        $this->params['filter_status_order'] = (in_array($request->input('filter_status_order'),$this->params['status_for_order_controller'])? $request->input('filter_status_order','all') : 'all');
        // dd($this->params['filter_status_order']);
        $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
        $this->params['search_value'] = $request->input('search_value','');        
        $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
        return view($this->pathViewName.'index',compact('items'))->with("params",$this->params);
    }
    
    public function changeStatus(Request $request)
    {
        // if(!Gate::allows('product.change_status')){
        //     return redirect('/no-permission');
        // }
        $id = $request->id;
        $status = $request->status;
        // dd($status);
        if($status =='default'){
            $status = 'ordered';
        }
        $this->model->updateItem(['id'=> $id,'status'=> $status],['task'=>'admin_change_status']);
        return redirect()->back()->with('notify', 'Thay đổi trạng thái đơn hàng thành công');
       
    }

    public function showOrderForUser(Request $request)
    {
        // if(!Gate::allows('product.change_status')){
        //     return redirect('/no-permission');
        // }
        $items = $this->model->getListItems($this->params,['task'=>'admin_get_list_items_for_user']);
        // dd($items); 
        return view($this->pathViewName.'user_order',compact('items'));

    }

    public function save(Request $request)
    {
        // if(!Gate::allows('role.save')){
        //     return redirect('/no-permission');
        // }
        if($request->method() == 'POST'){
            $params = $request->all();        
            $this->model->insertItem($params,['task'=>'admin_add_new_item']);
            Cart::destroy();
            return redirect('/gio-hang')->with('success', 'Bạn Đã Đặt Hàng Thành Công!');
           
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request)
    {
        // if(!Gate::allows('role.delete')){
        //     return redirect('/no-permission');
        // }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
        $this->model->deleteItem($item,['task'=>'admin_delete_item']);
        $notify = "Xóa Thành Công";
        return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
    }

}
