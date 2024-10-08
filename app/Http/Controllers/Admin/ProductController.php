<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product as MainModel;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest as MainRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Config;

class ProductController extends Controller
{
    use HasFactory;
    /**
     * Display a listing of the resource.
     */
    protected $pathViewName = 'admin.pages.product.';
    protected $controllerName ='product';
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
        $this->params['featured_templates'] = Config::get('linh_config.template.featured');
        view()->share(['controllerName' => $this->controllerName, 'params' => $this->params]);
    }
    public function index(Request $request)
    {
        if(!Gate::allows('product.view')){
            return redirect('/no-permission');
        }
        $this->params['filter_status'] = (in_array($request->input('filter_status'),$this->params['status_for_controller'])? $request->input('filter_status','all') : 'all');
        $this->params['search_field'] = (in_array($request->input('search_field','all'),$this->params['search_field_for_controller'])? $request->input('search_field','all') : 'all');
        $this->params['search_value'] = $request->input('search_value','');
        $this->params['filter_display'] = (in_array($request->input('display_field'),$this->params['display_for_controller'])? $request->input('display_field','all') : 'all');
        $status_counts = $this->model->countByStatus($this->params,['task'=>'admin_count_status']);
        $items = $this->model->getListItems($this->params, ['task'=>'admin_get_list_items']);
        // dd($items);
        return view($this->pathViewName.'index',compact('items','status_counts'))->with("params",$this->params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function changeStatus(Request $request)
    {
        if(!Gate::allows('product.change_status')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $status = $request->status;
        if($status =='default'){
            $status = 'active';
        }
        $this->model->updateItem(['id'=> $id,'status'=> $status],['task'=>'admin_change_status']);
        return redirect()->back()->with('notify', 'Kích hoạt trạng thái thành công');
       
    }
    //display in home or not
    public function changeDisplay(Request $request)
    {
        if(!Gate::allows('product.change_display')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $display = $request->display;
        if($display =='default'){
            $display = 'yes';
        }
        $this->model->updateItem(['id'=> $id,'display'=> $display],['task'=>'admin_change_display']);
        return redirect()->back()->with('notify', 'Kích hoạt trạng thái hiển thị thành công');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showFormAdd(Request $request)
    {
        if(!Gate::allows('product.add')){
            return redirect('/no-permission');
        }
        $brands = $this->model->getListBrands();
        $countries = $this->model->getListCountries();
        $categories = $this->model->getListCategories();
        return view($this->pathViewName.'form_add', compact('brands','countries','categories'));
    }

    public function showFormEdit(Request $request)
    {
        if(!Gate::allows('product.edit')){
            return redirect('/no-permission');
        }
        $brands = $this->model->getListBrands();
        $countries = $this->model->getListCountries();
        $categories = $this->model->getListCategories();
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id)
        // dd($item);
        return view($this->pathViewName.'form_edit', compact('item','brands','countries','categories'));
    }

    /**
     * Display the specified resource.
     */
    public function save(MainRequest $request)
    {
        if(!Gate::allows('product.save')){
            return redirect('/no-permission');
        }
        if($request->method() == 'POST'){
            $params = $request->all();    
            // dd($params);    
            if(!empty($request->id)){
                if($request->has($request->file('image_delete'))){
                    $params['image_delete'] = $request->file('image_delete');
                }
                $thumb = $this->model->getThumbsEdit($params,['task'=>'admin_get_item']);
                // dd($thumb);
                if($thumb == null){
                    return redirect()->back()->withErrors('Sản Phẩm phải có ít nhất 1 hình ảnh');
                }elseif($thumb == "false"){
                    return redirect()->back()->withErrors('Sản Phẩm Không Quá 3 Hình ảnh');
                }else{
                    $params['thumb'] = $thumb;
                    if(!empty($params['image_delete'])){
                        $this->model->deleteThumb($params['image_delete']);
                    }
                    $this->model->updateItem($params,['task'=>'admin_edit_item']);
                    $notify = "Chỉnh Sửa Thông Tin Thành Công";
                }
            }else{
                if(count($request->file('thumb'))>3){
                    return redirect()->back()->withErrors('Chỉ được tải lên tối đa 3 ảnh');
                }
                // $params['thumb'] =[];
                $params['thumb'] = $request->file('thumb');
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
        if(!Gate::allows('product.delete')){
            return redirect('/no-permission');
        }
        $id = $request->id;
        $item = $this->model->getItem($id,['task'=>'admin_get_item']); //find($id) infos in the db
        // dd($item);
        $this->model->deleteItem($item,['task'=>'admin_delete_item']);
        $notify = "Xóa Thành Công";
        return redirect()->route($this->controllerName.'.index')->with('notify', $notify);
    }
}
