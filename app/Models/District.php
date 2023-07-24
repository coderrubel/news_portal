<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'division_id',
        'district',
    ];


    public function rDivision(){
        return $this->belongsTo(Division::class, 'division_id');
    }
}
