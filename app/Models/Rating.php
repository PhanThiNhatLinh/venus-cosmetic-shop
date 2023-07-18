<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User; 

class Rating extends Model
{
    protected $table='rating';
    protected $fillable = ['id','user_id','rating','created_by','product_id'];
    public $timestamps = true;
    use HasFactory;
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
       return $this->belongsTo(Product::class, 'product_id');
    }

    public function insertItem($params=null,$options = null){
        //admin
        if($options['task'] == 'add_new_rating'){
            self::create($params);
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
