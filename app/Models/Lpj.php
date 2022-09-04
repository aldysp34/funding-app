<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpj extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'type',
        'size',
        'folder_path',
        'file_id',
        'verifikator_approved',
        'ketuaHarian_approved',
        'verifikator_id',
        'ketuaHarian_id',
        
    ];

    public function file(){
        return $this->belongsTo('App\Models\File');
    }
    public function verifikator(){
        return $this->belongsTo('App\Models\User', 'verifikator_id');
    }

    public function ketuaHarian(){
        return $this->belongsTo('App\Models\User', 'ketuaHarian_id');
    }
}
