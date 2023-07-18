<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table='product';
    protected $image_path='/admin/images/product';
    protected $fillable = ['id','name','description','status','display','thumb','featured','price_shock',
                         'created_by', 'modified_by', 'price', 'discount', 'stock',
                        'id_category', 'id_brand','id_country','expiry_date','code'];
    public $timestamps = true;

    use HasFactory;
    
    public function brand()
    {
       return $this->belongsTo(Brand::class, 'id_brand');
    }
    public function category()
    {
       return $this->belongsTo(Category::class, 'id_category');
    }
    public function country()
    {
       return $this->belongsTo(Country::class, 'id_country');
    }
    public function rating()
    {
       return $this->hasMany(Rating::class, 'product_id');
    }
    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','name','description','status','display','thumb','created_by','featured','price_shock',
                                'modified_by', 'price', 'discount', 'stock','id_category', 'id_brand','id_country','expiry_date','code');
                    if($params['filter_status'] !== 'all'){
                        $query->where('status',$params['filter_status']);
                    }
                    if($params['filter_display'] !== 'all'){
                        $query->where('display',$params['filter_display']);
                    }
                    if($params['search_field'] !== 'all'){
                        $query->where($params['search_field'], 'LIKE', "%{$params['search_value']}%");
                    }elseif($params['search_field'] == 'all'){
                        $query->where(function($query) use($params){
                            unset($params['search_field_for_controller'][0]); //delete the search_field 'all' in this case
                            foreach($params['search_field_for_controller'] as $colum){
                                $query->orWhere($colum,'LIKE', "%{$params['search_value']}%");
                            }
                        });
                    }
                   $results = $query->orderBy('id','DESC')->paginate($params['item_per_page']);
        }

        //frontend
        if($options['task'] == 'frontend_get_featured_items'){
            $query = self::select('id','name','description','status','display','thumb','created_by', 'featured',
            'modified_by', 'price', 'discount', 'stock','id_category', 'id_brand','id_country','expiry_date','code');
            $query->where('status','active')->where('display','yes')->where('featured','yes');
            $results = $query->orderBy('id','ASC')->take(6)->get()->toArray();
        }   

        if($options['task'] == 'frontend_get_latest_items'){// the latest products in db has the biggest ids
            $query = self::select('id','name','description','status','display','thumb','created_by', 'featured',
            'modified_by', 'price', 'discount', 'stock','id_category', 'id_brand','id_country','expiry_date','code');
            $query->where('status','active')->where('display','yes'); 
            $results = $query->orderBy('id','DESC')->take(5)->get()->toArray();
        }   

        if($options['task'] == 'frontend_get_promo_items'){// the latest products in db has the biggest ids
            $query = self::select('id','name','description','status','display','thumb','created_by', 'featured',
            'modified_by', 'price', 'discount', 'stock','id_category', 'id_brand','id_country','expiry_date','code');
            $query->where('status','active')->where('display','yes')->where('discount','>',0); 
            $results = $query->orderBy('id','DESC')->take(5)->get()->toArray();
        }   

        //frontend
        if($options['task'] == 'frontend_get_price_shock_item'){
            $query = self::select('id','name','status','display','thumb','price_shock','price', 'discount');
            $query->where('status','active')->where('display','yes')->where('price_shock','yes');
            $results = $query->orderBy('id','ASC')->take(1)->first();
        }   

        return $results;
    }

    public function countByStatus($params=null,$options = null){
        if($options['task'] == 'admin_count_status'){
            $query = self::groupBy('status')->selectRaw('count(id) as count, status');
                    if($params['filter_status'] !== 'all'){
                        $query->where('status',$params['filter_status']);
                    }
                    if($params['filter_display'] !== 'all'){
                        $query->where('display',$params['filter_display']);
                    }
                    if($params['search_field'] !== 'all'){
                        $query->where($params['search_field'], 'LIKE', "%{$params['search_value']}%");
                    }elseif($params['search_field'] == 'all'){
                        $query->where(function($query) use($params){
                            unset($params['search_field_for_controller'][0]); //delete the search_field 'all' in this case
                            foreach($params['search_field_for_controller'] as $colum){
                                $query->orWhere($colum,'LIKE', "%{$params['search_value']}%");
                            }
                        });
                    }
                    $results =  $query->get()->toArray();
        }            
        return $results;
    }

    public function updateItem($params=null,$options = null){
        // print_r($params);
        //admin
        if($options['task'] == 'admin_change_status'){
            $status = ($params['status'] == 'active') ? 'inactive' : 'active';
            self::findOrFail($params['id'])
                ->update(['status' => $status]);
        }
        if($options['task'] == 'admin_change_display'){
            $display = ($params['display'] == 'yes') ? 'no' : 'yes';
            self::findOrFail($params['id'])
                ->update(['display' => $display]);
        }
        if($options['task'] == 'admin_edit_item'){
            self::findOrFail($params['id'])
                ->update($params);
            
        }
    }    
    
    public function getThumbsEdit($params,$options){
        $thumbsCurrents = self::getItem($params['id'],['task'=>'admin_get_item'])->thumb;
        $thumbsCurrents = json_decode($thumbsCurrents, true); // json to array

        //remove the image checked in edit form
        if(!empty($params['image_delete'])){
            foreach($thumbsCurrents as $k=> $thumb){
                if(in_array($thumb,$params['image_delete'])){ //delete image checked in the db and public folder
                    unset($thumbsCurrents[$k]);
                }
            }
        }
        
        if(!isset($params['thumb'])){  //ko upload

            if(empty($thumbsCurrents)){ //xóa hết ảnh
                $params['thumb'] = null;
                // $params['thumb'] = json_encode($params['thumb']);
                $x=1;
            }else{ //còn ảnh, chưa xóa hết
                $params['thumb'] = json_encode($thumbsCurrents);
                $x=1;
            }
        }else{
            $total_thumb = count($params['thumb']) + count($thumbsCurrents);
            // dd($total_thumb);
            if($total_thumb > 3){ 
                $x=2;
            }else{
                if(!empty($thumbsCurrents)){ //xóa chưa hết + upload ảnh mới
                    $params['thumb'] = self::uploadImage($params['thumb']); //return array
                    $params['thumb'] = array_merge($params['thumb'],$thumbsCurrents);
                    // dd($params['thumb']);
                    $params['thumb'] = json_encode($params['thumb']);
                    $x=1;
                }
                if(empty($thumbsCurrents)){ //xóa hết + upload ảnh mới
                    $params['thumb'] = self::uploadImage($params['thumb']); //return array
                    $params['thumb'] = json_encode($params['thumb']);
                    $x=1;
                } 
            }
        }
        if($x==1){
            return $params['thumb'];
        }else{
            return "false";
        }
        
        
    }

    public function uploadImage($thumbObjs){
        $thumbNames =[];
        foreach($thumbObjs as  $k=> $thumbObj){
            $thumbName = Str::random(10)."-".$thumbObj->getClientOriginalName(); 
            $thumbObj->move(public_path($this->image_path), $thumbName);
            array_push($thumbNames,$thumbName);
        }
        
        return $thumbNames;
    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_add_new_item'){
            $params['thumb'] = self::uploadImage($params['thumb']);
            $params['created_by'] ='nhatlinh';
            $params['modified_by'] ='linh';
            self::create($params);
        }
    }
    public function deleteItem($item=null,$options = null){ 
        //admin
        if($options['task'] == 'admin_delete_item'){
            self::deleteThumb($item['thumb']);
            $item->delete();
        }
    }

    public function getItem($id=null,$options = null){ //get item info in the db belong to id
        //admin
        if($options['task'] == 'admin_get_item'){
           $results = self::findOrFail($id);
        }
        return $results;
    }

    public function deleteThumb($images_delete_array)
    {
        foreach($images_delete_array as $thumbName){
            //delete the image in folder public
            $thumbName = public_path($this->image_path).'/'.$thumbName;
            if(file_exists($thumbName)) {
                @unlink($thumbName);
            }
        }
    }

    public function getListBrands(){ 
        $results = Brand::all();
        return $results;
    } 

    public function getListCountries(){ 
        $results = Country::all();
        return $results;
    } 
    
    public function getListCategories(){ 
        $results = Category::all();
        return $results;
    } 

    public function searchItem($params =null, $options =null){ 
        if($options['task'] == 'frontend_search_item'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','name','description','status','display','thumb','created_by','featured','price_shock',
                                'modified_by', 'price', 'discount', 'stock','id_category', 'id_brand','id_country','expiry_date','code');
                    $query->where(function($query) use ($params){
                        $query->where('name','LIKE', "%{$params['search_data']}%");
                        $query->orWhere('description','LIKE', "%{$params['search_data']}%");
                        $query->orWhere('code','LIKE', "%{$params['search_data']}%");
                    });
                    $results =  $query->get()->toArray();
        }
        return $results;
    }
}
