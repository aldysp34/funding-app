<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarVerifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'filename',
        'type',
        'size',
        'file_id',
        'folder_path'
    ];

    public function file(){
        return $this->belongsTo('App\Models\Suratbayar');
    }
}
