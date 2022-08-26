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

        $upload = LembarVerifikasi::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'file_id' => $id,
            'folder_path' => $path
        ]);
        

        return redirect()->route('verifikator.home')->with(['msg' => 'Dokumen Berhasil Diupload']);
    }

    public function downloadFile($id){
        $file = LembarVerifikasi::where('id', $id)->first();
        $filepath = public_path().'/'.$file->folder_path;

        // dd($file->folder_path);
        if(file_exists($filepath)){
            return \Response::download($filepath);
        }else{
            abort(404);
        }
    }
}
