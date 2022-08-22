<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\RincianBiaya;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use App\Models\Kegiatan;

class FileController extends Controller
{

    private function amount_costs($volume_1, $volume_2, $volume_3, $harga_satuan){
        return ($volume_1*$volume_2*$volume_3*$harga_satuan);
    }

    public function store(StoreFileRequest $request){
        $kegiatan = Kegiatan::where('id', $request->input('kegiatan_id'))->first();
        $filename = $kegiatan->bidang->name.'_'.$kegiatan->kategori->name.'_'.$request->input('name').'_proposal.'.$request->file->extension();
        $filename = strtolower($filename);

        $filePath = strtolower('files/'.$kegiatan->bidang->name.'/'.$kegiatan->kategori->name.'/proposal');
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $path = $request->file->move($filePath, $filename);
        $fileCreate = File::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'path' => $path,
            'status' => 3,
            'ajukan_status' => 1,
            'verifikator_approved' => 0,
            'ketuaHarian_approved' => 0,
            'kegiatan_id' => $request->input('kegiatan_id'),
        ]);

        $rincianBiaya = array();
        for($i=1;$i<4;$i++){
            $rincianBiaya['volume_'.$i] = $request->input('volume_'.$i);
            $rincianBiaya['satuan_'.$i] = $request->input('satuan_'.$i);
        }
        $rincianBiaya['harga_satuan'] = $request->input('harga_satuan');
        $rincianBiaya['jumlah'] = $request->input('jumlah');
        $rincianBiaya['kegiatan_id'] = $request->input('kegiatan_id');

        $biaya = RincianBiaya::where('kegiatan_id', $request->input('kegiatan_id'));
        $biaya->update($rincianBiaya);

        return redirect()->route('ketua-bidang.upload_dokumen')->with(['msg' => 'Berhasil Upload Proposal']);
    }

    public function downloadFile($bidang, $kategori, $filename){
        $fname = strtolower($filename);
        $filepath = strtolower("/files"."/".$bidang."/".$kategori."/proposal"."/".$fname);
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

    public function cancelSubmit($id){
        $file = File::findOrFail($id);

        if($file){
            $file->ajukan_status = 0;
            $file->save();
        }else{
            abort(404);
        }

        return redirect()->route('ketua-bidang.home')->with(['msg' => 'Berhasil Membatalkan Pengajuan!']);
    }

    public function destroy($id){
        $file = File::where('id', $id);
        
        if($file){
            $file->delete();
            return redirect()->route('admin.files')->with(['msg' => 'Berhasil Menghapus File']);
        }

        return redirect()->route('admin.files')->with(['errorMsg' => 'ID File Tidak Ditemukan']);
    }
}
