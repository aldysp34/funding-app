<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratbayar extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'type',
        'size',
        'file_id'
    ];
    
    public function file(){
        return $this->belongsTo('App\Models\Suratbayar');
    }
}
