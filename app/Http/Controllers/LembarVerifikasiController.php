<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLembarVerifikasiRequest;
use App\Models\LembarVerifikasi;
use Illuminate\Http\UploadedFile;

class LembarVerifikasiController extends Controller
{
    public function store(StoreLembarVerifikasiRequest $request, $id, $data){
        $filename = $data.'_lembar verifikasi.'.$request->file->extension();
        $filePath = strtolower('files/lembar verifikasi');
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

    public function downloadFile($filename){
        $fileName = $filename."_lembar verifikasi.pdf";
        $file = public_path()."/files/lembar verifikasi/".$fileName;

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
