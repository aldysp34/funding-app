<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLembarVerifikasiRequest;
use App\Models\LembarVerifikasi;
use Illuminate\Http\UploadedFile;
use App\Models\File;

class LembarVerifikasiController extends Controller
{
    public function store(StoreLembarVerifikasiRequest $request, $id, $data){
        $file = File::where('id', $id)->first();
        $filename = $file->kegiatan->bidang->name.'_'.$file->kegiatan->kategori->name.'_'.$data.'_lembar verifikasi.'.$request->file->extension();
        $filename = strtolower($filename);
        
        $filePath = strtolower('files/'.$file->kegiatan->bidang->name.'/'.$file->kegiatan->kategori->name.'/lembar verifikasi');
        
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $path = $request->file->move($filePath, $filename);

        LembarVerifikasi::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'file_id' => $id
        ]);
        

        return redirect()->route('verifikator.home')->with(['msg' => 'Dokumen Berhasil Diupload']);
    }

    public function downloadFile($bidang, $kategori, $filename){
        $fname = strtolower($filename);
        $filepath = strtolower("/files"."/".$bidang."/".$kategori."/lembar verifikasi"."/".$fname);
        $file = public_path().$filepath;
        $headers = array(
            'Content-Type: application/pdf',
        );
        if(file_exists($file)){
            return \Response::download($file, $fname, $headers);
        }
        else{
            abort(404);
        }
    }
}
