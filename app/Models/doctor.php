<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'gender',
        'division',
        'district',
        'specialist',
        'degree',
        'designation',
        'hospital',
        'bmdc',
        'mobile1',
        'mobile2',
        'chamber',
        'description',
        'photo',
        'email',
        'rating',
        'view'
    ];
}
