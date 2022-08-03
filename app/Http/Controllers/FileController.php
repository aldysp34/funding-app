<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;

class FileController extends Controller
{
    public function store(StoreFileRequest $request){
        $subject = $request->input('subject');
        $filename = auth()->user()->bidang->name.'_Proposal_'.$subject.'.'.$request->file->extension();
        $filename = strtolower($filename);
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $filePath = strtolower('files/'.auth()->user()->bidang->name.'/proposal');

        $path = $request->file->move($filePath, $filename);
        File::create([
            'subject' => $subject,
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'path' => $path,
            'status' => 3,
            'verifikator_approved' => 0,
            'ketuaHarian_approved' => 0,
            'user_id' => auth()->user()->id
        ]);
        

        return redirect()->route('ketua-bidang.upload_dokumen')->with(['msg' => 'Dokumen Berhasil Diupload']);
    }

    public function downloadFile($filename){
        $fileName = auth()->user()->bidang->name."_proposal_".$filename.".pdf";
        $file = public_path()."/files"."/".auth()->user()->bidang->name."/proposal"."/".$fileName;

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
