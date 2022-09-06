<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kegiatan;
use App\Models\File;

class KategoriKegiatan extends Model
{
    use HasFactory;

    public function bidang(){
        return $this->belongsTo('App\Models\Bidang');
    }

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class, 'kategori_id');
    }

    public function file(){
        return $this->hasone(File::class, 'kategoriKegiatan_id');
    }
}
