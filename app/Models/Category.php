<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'user_id',
        'category_name',
        'show_on_menu',
        'catagory_order',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','user_id','sho_on_menu','catagory_order');
    }
    public function rrPost(){
        return $this->belongsTo(Post::class, 'id');
    }
    public function rrCaregory(){
        return $this->belongsTo(SubCatagory::class, 'id');
    }
}
