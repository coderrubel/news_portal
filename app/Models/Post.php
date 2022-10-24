<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function rCaregory(){
        return $this->belongsTo(SubCatagory::class, 'sub_category_id');
    }
}
