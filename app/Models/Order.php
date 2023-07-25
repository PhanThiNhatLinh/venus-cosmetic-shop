<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Product; 
use Illuminate\Support\Facades\Auth;
use DB;

class Order extends Model
{
    protected $table='order';
    protected $fillable = ['id','user_id','created_at','status','updated_at'];
    public $timestamps = true;
    use HasFactory;

    public function product()
    {
        return $this->belongsToMany(Product::class,'order_detail')->withPivot('quantity');//add the colum without foreign key in the pivot table 
    }
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','user_id','created_at','status','updated_at');
            // dd($params['filter_status_order']);
            // dd($query);
            if($params['filter_status_order'] !== 'all'){
                $query->where('status',$params['filter_status_order']);
            }
            if($params['search_field'] !== 'all'){
                $query->where($params['search_field'], 'LIKE', "%{$params['search_value']}%");
            }elseif($params['search_field'] == 'all'){
                $query->where(function($query) use($params){
                    foreach($this->fillable as $colum){
                        $query->orWhere($colum,'LIKE', "%{$params['search_value']}%");
                    }
                });
            }
            
            if(empty($query->get()->toArray())){
                //research in product table the product name = $params['search_value'];
                $query_product = self::with(['product' => function ($query) use($params) {
                    $query->where('name','LIKE', "%{$params['search_value']}%");
                }]);
                $products = $query_product->get()->toArray();
                // dd($products);
                foreach($products as $product){
                    if(count($product['product'])>0){
                        $query->orWhere('id','=', $product['id']);
                        if($params['filter_status_order'] !== 'all'){
                            $query->where('status',$params['filter_status_order']);
                        }
                    }

                }
               
                //research in user table the client name = $params['search_value'];
                $query_user = self::with(['user' => function ($query) use($params) {
                    $query->where('name','LIKE', "%{$params['search_value']}%")
                        ->orWhere('phone','LIKE', "%{$params['search_value']}%")
                        ->orWhere('address','LIKE', "%{$params['search_value']}%")
                        ->orWhere('email','LIKE', "%{$params['search_value']}%");
                }]);
                $users = $query_user->get()->toArray();
                // dd($users);
                foreach($users as $user){
                    if(!empty($user['user']) && count($user['user'])>0){
                        $query->orWhere('id','=', $user['id']);
                        if($params['filter_status_order'] !== 'all'){
                            $query->where('status',$params['filter_status_order']);
                        }
                    }
                }
                
            }
           
            $results = $query->orderBy('id','DESC')->paginate($params['item_per_page']);
        }

        if($options['task'] == 'admin_get_list_items_for_user'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','user_id','created_at','status','updated_at')->where('user_id', Auth::user()->id);
                if($params['filter_status_order'] !== 'all'){
                    $query->where('status',$params['filter_status_order']);
                }
                if($params['search_field'] !== 'all'){
                    $query->where($params['search_field'], 'LIKE', "%{$params['search_value']}%");
                }elseif($params['search_field'] == 'all'){
                    $query->where(function($query) use($params){
                        foreach($this->fillable as $colum){
                            $query->orWhere($colum,'LIKE', "%{$params['search_value']}%");
                        }
                    });
                }
            $results = $query->orderBy('id','DESC')->paginate($params['item_per_page']);
        }
        //frontend

        return $results;
    }

    public function updateItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_change_status'){
            self::findOrFail($params['id'])
                ->update(['status' => $params['status']]);
        }
        //frontend

    }

    public function getItem($id=null,$options = null){ //get item info in the db belong to id
        //admin
        if($options['task'] == 'admin_get_item'){
           $results = self::findOrFail($id);
        }
        return $results;
    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_add_new_item'){
            $orders = self::create($params);
            $sync_data = [];
            for($i = 0; $i < count($params['product_id']); $i++){
                $sync_data[$params['product_id'][$i]] = ['quantity' => $params['quantity'][$i]];
            }
            $orders->product()->attach($sync_data); 
        }
    }

    public function deleteItem($item=null,$options = null){
        //admin
        if($options['task'] == 'admin_delete_item'){
            $item->delete();
        }
    }

    

}
