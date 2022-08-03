<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSuratBayarRequest;
use App\Models\Suratbayar;
use Illuminate\Http\UploadedFile;

class SuratBayarController extends Controller
{
    public function store(StoreSuratBayarRequest $request, $id, $data){
        $filename = auth()->user()->bidang->name.'_surat bayar_'.$data.'.'.$request->file->extension();
        $filePath = strtolower('files/'.auth()->user()->bidang->name.'/surat bayar');
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

    public function downloadFile($filename){
        $fileName = auth()->user()->bidang->name."_surat bayar_".$filename.".pdf";
        $file = public_path()."/files"."/".auth()->user()->bidang->name."/surat bayar"."/".$fileName;

        $headers = array(
            'Content-Type: application/pdf',
        );

        if(file_exists($file)){
            return \Response::download($file, $fileName, $headers);
        }
        else{
            abort(404);
        }
    }
}
