<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFileRequest;
use App\Models\Lpj;
use App\Models\File;

class LpjController extends Controller
{
    public function store(StoreFileRequest $request, $id, $data){
        $file = File::where('id', $id)->with('kategoriKegiatan')->first();
        $filename = $file->kategoriKegiatan->bidang->name.'_'.$file->kategoriKegiatan->name.'_'.$data.'_lpj.'.$request->file->extension();
        $filename = strtolower($filename);

        $filePath = strtolower('files/'.$file->kategoriKegiatan->bidang->name.'/'.$file->kategoriKegiatan->name.'/lpj');
        
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $path = $request->file->move($filePath, $filename);
        $upload = Lpj::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'file_id' => $id,
            'folder_path' => $path,
            'verifikator_approved' => 0,
            'ketuaHarian_approved' => 0,
        ]);

        if($upload){
            return redirect()->route('ketua-bidang.upload_lpj')->with(['msg' => 'Sukses Upload LPJ']);
        }

        abort(404);
    }

    public function downloadFile($id){
        $file = Lpj::where('id', $id)->first();
        $filepath = public_path().'/'.$file->folder_path;

        // dd($file->folder_path);
        if(file_exists($filepath)){
            return \Response::download($filepath);
        }else{
            abort(404);
        }
    }
}
