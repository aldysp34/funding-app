<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratbayar extends Model
{
    use HasFactory;

    public function file(){
        return $this->belongsTo('App\Models\Suratbayar');
    }
}
