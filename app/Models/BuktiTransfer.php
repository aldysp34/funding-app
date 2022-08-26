<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penerima',
        'npwp_penerima', 
        'alamat_penerima',
        'rekening_penerima',
        'nominal',
        'filename',
        'type',
        'size',
        'bank_id',
        'date_of_transaction',
        'folder_path'
    ];

    public function bank(){
        return $this->belongsTo('App\Models\Bank');
    }
}
