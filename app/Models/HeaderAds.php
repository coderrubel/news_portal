<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderAds extends Model
{
    use HasFactory;
    protected $fillable = [
        'ads_name',
        'ads_url',
        'ads_image',
    ];
}
