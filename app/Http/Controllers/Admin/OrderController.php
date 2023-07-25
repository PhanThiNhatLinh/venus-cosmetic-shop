<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

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
        $this->params['filter_status_order'] = (in_array($request->input('filter_status_order'),$this->params['status_for_order_controller'])? $request->input('filter_status_order','all') : 'all');
        // dd($this->params['filter_status_order']);
        $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
        $this->params['search_value'] = $request->input('search_value','');        
        if(Gate::allows('order.view')){
            $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
        }else{
            $items= $this->model->getListItems($this->params,['task'=>'admin_get_list_items_for_user']);
        }
        return view($this->pathViewName.'index',compact('items'))->with("params",$this->params);
    }
    
    public function changeStatus(Request $request)
    {
        if(!Gate::allows('order.change_status')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $status = $request->status;
        // dd($status);
        if($status =='default'){
            $status = 'ordered';
        }
        $this->model->updateItem(['id'=> $id,'status'=> $status],['task'=>'admin_change_status']);
        return redirect()->back()->with('notify', 'Thay đổi trạng thái đơn hàng thành công');
       
    }

    public function save(Request $request)
    {
        if(!Gate::allows('order.save')){
            return redirect('/no-permission');
        }
        if($request->method() == 'POST'){
            $params = $request->all();     
            $this->model->insertItem($params,['task'=>'admin_add_new_item']);
            $order_id = $this->model->orderBy('id', 'desc')->first()->id;
            $order_infos = $this->model->getItem($order_id,['task'=>'admin_get_item']);
            $products = $order_infos->product;
            $client_name = $order_infos->user->name;
            $phone = $order_infos->user->phone;
            $address = $order_infos->user->address;
            $created_at = date(Config::get('linh_config.date.long_time'), strtotime($order_infos['created_at']));
            $infos= ['order_id'=>$order_id,'products'=>$products, 'client_name'=>$client_name, 'phone'=>$phone, 'address'=>$address, 'created_at'=>$created_at];
            Cart::destroy();
            Mail::to('nhatlinhphan9999@gmail.com')->send(new DemoMail($infos));
            return redirect('/gio-hang')->with('success', 'Bạn Đã Đặt Hàng Thành Công! Hãy kiểm tra mail để xem mail xác nhận đơn hàng nhé!');           
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Request $request)
    {
        if(!Gate::allows('order.delete')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
        $this->model->deleteItem($item,['task'=>'admin_delete_item']);
        return redirect()->back()->with('notify', 'Xóa Thành Công');
    }

}
