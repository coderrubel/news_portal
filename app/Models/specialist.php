<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialist extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'division_id',
        'district_id',
        'spec',
    ];


    public function rDistrict(){
        return $this->belongsTo(Division::class, 'district_id');
    }
}
