<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'status',
        'phone',
        'thumb',
        'address',
        'birthday',
        'created_at',
        'updated_at'
    ];
    protected $image_path='/admin/images/user';
    public $timestamps = true;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            $query = self::select('id', 'email', 'name', 'level', 'password','thumb','phone','address','birthday','status');
                    if($params['filter_status'] !== 'all'){
                        $query->where('status',$params['filter_status']);
                    }
                    if($params['filter_level'] !== 'all'){
                        $query->where('level',$params['filter_level']);
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

        if($options['task'] == 'frontend_get_list_items'){
            $query = self::select('id', 'email', 'name', 'level', 'password');
            $query->where('status','active');
            $results = $query->orderBy('id','ASC')->get()->toArray();
        }    

        return $results;
    }

    public function countByStatus($params=null,$options = null){
        if($options['task'] == 'admin_count_status'){
            $query = self::groupBy('status')->selectRaw('count(id) as count, status');
                if($params['filter_status'] !== 'all'){
                    $query->where('status',$params['filter_status']);
                }
                if($params['filter_level'] !== 'all'){
                    $query->where('level',$params['filter_level']);
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
        // admin
        if($options['task'] == 'admin_change_status'){
            $status = ($params['status'] == 'active') ? 'inactive' : 'active';
            self::findOrFail($params['id'])
                ->update(['status' => $status]);
        }

        if($options['task'] == 'admin_change_level'){
            $level = $params['level'];
            self::findOrFail($params['id'])
                ->update(['level' => $level]);
        }

        if($options['task'] == 'admin_edit_item'){
            if(!empty($params['thumb'])){
                $params['thumb'] = self::uploadImage($params['thumb']);
            }
            self::findOrFail($params['id'])
                ->update($params);
        }

        if($options['task'] == 'change-password'){ //ko dùng md5 cho password vì khi vào user Auth sẽ tự md5 rồi
            // dd($params['password']);
            self::findOrFail($params['id'])
                ->update(['password' => $params['password']]);
        }
        //frontend
    }
    public function uploadImage($thumbObj){
        $thumbName = Str::random(10)."-".$thumbObj->getClientOriginalName(); 
        $thumbObj->move(public_path($this->image_path), $thumbName);
        return $thumbName;
    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_add_new_item'){
            $params['thumb'] = self::uploadImage($params['thumb']);
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

    public function deleteThumb($thumbName){
        //delete the image in folder public
        $thumbName = public_path($this->image_path).'/'.$thumbName;
        if(file_exists($thumbName)) {
           @unlink($thumbName);
        }
    }
}
