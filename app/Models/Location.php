<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'building',
        'street',
        'area',
        'position'
    ];

    public function users(){
        return $this->hasMany(User::class,'user_id');
    }
}
