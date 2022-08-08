<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBidangRequest;
use App\Models\Bidang;
use Illuminate\Http\UploadedFile;

class BidangController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidangRequest $request)
    {
        $bidangName = $request->name;

        Bidang::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.bidang')->with(['msg' => 'Berhasil Menambahkan Bidang Baru']);
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
    public function edit(StoreBidangRequest $request, $id)
    {
        $bidangName = $request->name;
        $bidang = Bidang::findOrFail($id);

        if($bidang){
            $bidang->name = $bidangName;
            $bidang->save();

            return redirect()->route('admin.bidang')->with(['msg' => 'Berhasil Mengedit Bidang']);
        }

        return redirect()->route('admin.bidang')->with(['errorMsg' => 'Id Bidang Tidak Ditemukan']);
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
        $bidang = Bidang::where('id', $id);
        
        if($bidang){
            $bidang->delete();
            return redirect()->route('admin.bidang')->with(['msg' => 'Berhasil Menghapus Bidang']);
        }

        return redirect()->route('admin.bidang')->with(['errorMsg' => 'ID Bidang Tidak Ditemukan']);

    }
}
