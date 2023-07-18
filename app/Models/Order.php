<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Product; 
use Illuminate\Support\Facades\Auth;


class Order extends Model
{
    protected $table='order';
    protected $fillable = ['id','user_id','created_at','status','updated_at'];
    public $timestamps = true;
    use HasFactory;

    public function product()
    {
        return $this->belongsToMany(Product::class,'order_detail')->withPivot('quantity');;
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
            if($params['filter_status_order'] !== 'all'){
                $query->where('status',$params['filter_status_order']);
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
            $results = $query->orderBy('id','ASC')->paginate($params['item_per_page']);
        }

        if($options['task'] == 'admin_get_list_items_for_user'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','user_id','created_at','status','updated_at')->where('user_id', Auth::user()->id);
            $results = $query->orderBy('id','ASC')->paginate($params['item_per_page']);
        }
        //frontend

        return $results;
    }

    public function updateItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_edit_item'){
            $role = self::findOrFail($params['id']);
            if(empty($params['permission_checkbox'])){
                $params['permission_checkbox'] = [];
            }
            $role->permission()->sync($params['permission_checkbox']); //cập nhật vai trò permission_id vào bảng role_permission
            $role->update($params);        
        }

        if($options['task'] == 'admin_change_status'){
            self::findOrFail($params['id'])
                ->update(['status' => $params['status']]);
        }
        //frontend

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
