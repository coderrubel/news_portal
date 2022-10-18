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
        'show_on_menu',
        'sub_catagory_order',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id','category_id','sub_category_name','show_on_menu','sub_catagory_order');
    }
}
