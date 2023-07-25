<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permission';
    protected $fillable = ['id','name','description','slug'];
    public $timestamps = true;
    use HasFactory;
    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','name','description','slug');
            if($params['modules_field'] !== 'all'){
                $query->where('slug','LIKE', "%{$params['modules_field']}%");
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
        if($options['task'] == 'admin_edit_item'){
            self::findOrFail($params['id'])
                ->update($params);
        }
        
        //frontend

    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_add_new_item'){
            self::create($params);
        }
    }

    public function deleteItem($item=null,$options = null){
        //admin
        if($options['task'] == 'admin_delete_item'){
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

}
