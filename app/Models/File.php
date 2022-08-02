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
        'verifikator_approved',
        'ketuaHarian_approved',
        'user_id'
    ];

    public function suratbayar(){
        return $this->hasOne('App\Models\Suratbayar');
    }

    public function lembarVerifikasi(){
        return $this->hasOne('App\Models\LembarVerifikasi');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
