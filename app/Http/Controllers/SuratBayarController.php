<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSuratBayarRequest;
use App\Models\Suratbayar;
use Illuminate\Http\UploadedFile;
use App\Models\File;

class SuratBayarController extends Controller
{
    public function store(StoreSuratBayarRequest $request, $id, $data){
        $file = File::where('id', $id)->first();
        $filename = $file->kegiatan->bidang->name.'_'.$file->kegiatan->kategori->name.'_'.$data.'_surat bayar.'.$request->file->extension();
        $filename = strtolower($filename);
        
        $filePath = strtolower('files/'.$file->kegiatan->bidang->name.'/'.$file->kegiatan->kategori->name.'/surat bayar');
        
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $path = $request->file->move($filePath, $filename);
        Suratbayar::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'file_id' => $id
        ]);
        

        return redirect()->route('bendahara.home')->with(['msg' => 'Dokumen Berhasil Diupload']);
    }

    public function downloadFile($bidang, $kategori, $filename){
        $fname = strtolower($filename);
        $filepath = strtolower("/files"."/".$bidang."/".$kategori."/surat bayar"."/".$fname);
        $file = public_path().$filepath;
        // dd($file);
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
