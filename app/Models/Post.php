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
        'post_photo',
        'post_detail',
        'is_comment',
        'is_share',
        'visitors'
    ];


    public function rCaregory(){
        return $this->belongsTo(SubCatagory::class, 'sub_category_id');
    }
}
