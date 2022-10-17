<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_name',
        'show_on_menu',
        'sub_catagory_order',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id');
    }
}
