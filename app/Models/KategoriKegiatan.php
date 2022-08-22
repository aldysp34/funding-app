<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKegiatan extends Model
{
    use HasFactory;

    public function bidang(){
        return $this->belongsTo('App\Models\Bidang');
    }

    public function kegiatan(){
        return $this->hasMany('App\Models\Kegiatan');
    }
}
