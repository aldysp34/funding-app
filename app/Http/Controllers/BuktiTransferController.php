<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBuktiTransferRequest;
use App\Models\BuktiTransfer;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class BuktiTransferController extends Controller
{
    public function store(StoreBuktiTransferRequest $request){
        $filename = 'bukti transfer_'.$request->nama_penerima.'.'.$request->file->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/bukti transfer');
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $path = $request->file->move($filepath, $filename);

        // dd($path);
        $buktiCreate = BuktiTransfer::create([
            'nama_penerima' => $request->nama_penerima,
            'npwp_penerima' => $request->npwp_penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'rekening_penerima' => $request->rekening_penerima,
            'filename' => $filename,
            'nominal' => $request->nominal,
            'type' => $type,
            'size' => $size,
            'bank_id' => $request->bank,
            'date_of_transaction' => $request->date,
            'folder_path' => $path
        ]);

        if($buktiCreate){
            return redirect()->route('bendahara.transfer')->with(['msg' => 'Berhasil Menambahkan Bukti Transfer']);
        }
        return redirect()->route('bendahara.uploadTF')->withErrors(['msg' => 'Terjadi Kesalahan']);
    }

    public function download($id){
        $file = BuktiTransfer::where('id', $id)->first();
        $filepath = public_path().'/'.$file->folder_path;

        // dd($file->folder_path);
        if(file_exists($filepath)){
            return \Response::download($filepath);
        }else{
            abort(404);
        }
        // return redirect()->back()->withErrors(['msg' => 'File Tidak Ditemukan']);
    }


}
