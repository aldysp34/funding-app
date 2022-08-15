<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianBiaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'volume_1',
        'satuan_1',
        'volume_2',
        'satuan_2',
        'volume_3',
        'satuan_3',
        'harga_satuan',
        'jumlah',
        'kegiatan_id'
    ];

    public function kegiatan(){
        return $this->belongsTo('App\Models\Kegiatan');
    }


}
