<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'user_name',
        'sub_category_id',
        'post_title',
        'post_detail'
    ];


    public function rCaregory(){
        return $this->belongsTo(SubCatagory::class, 'sub_category_id');
    }
}
