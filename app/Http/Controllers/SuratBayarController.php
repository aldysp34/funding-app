<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSuratBayarRequest;
use App\Models\Suratbayar;
use Illuminate\Http\UploadedFile;

class SuratBayarController extends Controller
{
    public function store(StoreSuratBayarRequest $request, $id, $data){
        $filename = $data.'_surat bayar.'.$request->file->extension();
        $filePath = strtolower('files/surat bayar');
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
        $fileName = $filename."_surat bayar.pdf";
        $file = public_path()."/files/surat bayar/".$fileName;

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
