<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // One to Many User
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
