<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'filename',
        'type',
        'size',
        'status',
        'ajukan_status',
        'verifikator_approved',
        'ketuaHarian_approved',
        'user_id',
        'verifikator_id',
        'ketuaHarian_id'
    ];

    public function suratbayar(){
        return $this->hasOne('App\Models\Suratbayar');
    }

    public function lembarVerifikasi(){
        return $this->hasOne('App\Models\LembarVerifikasi');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function verifikator(){
        return $this->belongsTo('App\Models\User', 'verifikator_id');
    }

    public function ketuaHarian(){
        return $this->belongsTo('App\Models\User', 'ketuaHarian_id');
    }
}
