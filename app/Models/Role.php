<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission; 


class Role extends Model
{
    protected $table='roles';
    protected $fillable = ['id','name','description'];
    public $timestamps = true;
    use HasFactory;

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'roles_permission'); //liên kết đến bảng trung gian
    }

    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            // $results = self::paginate($params['item_per_page']);
            $query = self::select('id','name','description');
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
            $role = self::findOrFail($params['id']);
            if(empty($params['permission_checkbox'])){
                $params['permission_checkbox'] = [];
            }
            $role->permission()->sync($params['permission_checkbox']); //cập nhật vai trò permission_id vào bảng role_permission
            $role->update($params);        
        }
        
        //frontend

    }
    public function getAllPermission(){
        //admin
        $results = Permission::all()->toArray();
        return $results;
    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_add_new_item'){
            $roles = self::create($params);
            $roles->permission()->attach($params['permission_checkbox']); //đưa những id của permission được chọn vào bảng roles_permission
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
           $result = self::findOrFail($id);
        }
        return $result;
    }

}
