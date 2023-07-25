<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'id',
        'name',
        'email',
        'password',
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

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role'); //liên kết đến bảng trung gian
    }

    public function getAllRoles()
    {
        $roles = Role::all()->toArray();
        return $roles;
    }

    public function hasPermission($permission)
    {
        // dd($this->roles); == Auth::user->roles - kiểm tra xem user đang truy cập có quyền gì
        foreach($this->roles as $role){
            if($role->permission->where('slug', $permission)->count()>0){
                return true;
            }
            return false;
        }
    }
    
    public function hasRole($params)
    {
        // dd($this->roles); == Auth::user->roles - kiểm tra xem user đang truy cập có quyền gì
        foreach($this->roles as $role){
            if($role['name'] == $params){
                return true;
            }
            return false;
        }
    }

    public function getListItems($params=null,$options = null){
        //admin
        if($options['task'] == 'admin_get_list_items'){
            $query = self::select('id', 'email', 'name', 'password','thumb','phone','address','birthday','status');
                    if($params['filter_status'] !== 'all'){
                        $query->where('status',$params['filter_status']);
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

        if($options['task'] == 'frontend_get_list_items'){
            $query = self::select('id', 'email', 'name', 'password');
            $query->where('status','active');
            $results = $query->orderBy('id','DESC')->get()->toArray();
        }    

        return $results;
    }

    public function countByStatus($params=null,$options = null){
        if($options['task'] == 'admin_count_status'){
            $query = self::groupBy('status')->selectRaw('count(id) as count, status');
                if($params['filter_status'] !== 'all'){
                    $query->where('status',$params['filter_status']);
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

        if($options['task'] == 'admin_change_role'){
            $user = self::findOrFail($params['id']);
            $user->roles()->sync($params['role_id']); //cập nhật vai trò permission_id vào bảng user_role
            $user->update(['role_id' => $params['role_id']]);
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
            if(!empty($params['thumb'])){
                $params['thumb'] = self::uploadImage($params['thumb']);
            }else{
                $params['thumb'] = 'user-icon-1.png'; 
            }
            $user = self::create($params);
            if(empty($params['roles'])){
                $params['roles'] = '';
            }
            $user->roles()->attach($params['roles']); //đưa những id của roles được chọn vào bảng user_role
        }

        if($options['task'] == 'register'){
            $user = self::create($params);
            $user->roles()->attach($params['roles']); //đưa những id của roles được chọn vào bảng user_role
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
