<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCatagory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'category_id',
        'sub_category_name',
    ];

    public function rCaregory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function rPost(){
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->hasOne(User::class, 'id','category_name','sub_category_name');
    }
}
