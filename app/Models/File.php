<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'type',
        'size',
        'status',
        'ajukan_status',
        'verifikator_approved',
        'ketuaHarian_approved',
        'verifikator_id',
        'ketuaHarian_id',
        'kategoriKegiatan_id',
        'folder_path'
    ];

    public function suratbayar(){
        return $this->hasOne('App\Models\Suratbayar');
    }

    public function lembarVerifikasi(){
        return $this->hasOne('App\Models\LembarVerifikasi');
    }

    public function rincianBiaya(){
        return $this->hasOne('App\Models\RincianBiaya');
    }

    public function lpj(){
        return $this->hasOne('App\Models\Lpj');
    }
    
    public function verifikator(){
        return $this->belongsTo('App\Models\User', 'verifikator_id');
    }

    public function ketuaHarian(){
        return $this->belongsTo('App\Models\User', 'ketuaHarian_id');
    }

    public function kegiatan(){
        return $this->belongsTo('App\Models\Kegiatan');
    }

    public function kategoriKegiatan(){
        return $this->belongsTo('App\Models\KategoriKegiatan', 'kategoriKegiatan_id');
    }
}
