<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\RincianBiaya;
use App\Http\Requests\StoreKegiatanRequest;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKegiatanRequest $request)
    {
        $createKegiatan = Kegiatan::create([
            'bidang_id' => $request->input('bidang'),
            'name' => $request->input('name'),
            'budget' => $request->input('budget')
        ]);

        $rincianBiaya = array();
        for($i=1;$i<4;$i++){
            $rincianBiaya['volume_'.$i] = $request->input('volume_'.$i);
            $rincianBiaya['satuan_'.$i] = $request->input('satuan_'.$i);
        }
        $rincianBiaya['harga_satuan'] = $request->input('harga_satuan');
        $rincianBiaya['jumlah'] = $request->input('jumlah');

        $rincianBiaya['kegiatan_id'] = $createKegiatan->id;

        $createBiaya = RincianBiaya::create($rincianBiaya);

        if($createKegiatan && $createBiaya){
            return redirect()->back()->with(['msg', 'Berhasil Menambahkan Kegiatan']);
        }

        return redirect()->back()->with(['errorMsg', 'Gagal Menambahkan Kegiatan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
