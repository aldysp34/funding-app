<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'budget',
        'bidang_id',
        'ketuaBidang_id'
    ];

    public function bidang(){
        return $this->belongsTo('App\Models\Bidang');
    }

    public function ketuaBidang(){
        return $this->belongsTo('App\Models\User');
    }

    public function rincianBiaya(){
        return $this->hasOne('App\Models\RincianBiaya');
    }
}
