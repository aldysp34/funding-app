<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
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
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_access' => $request->jabatanName,
            'bidang_id' => $request->bidangName
        ]);

        return redirect()->route('admin.user')->with(['msg' => 'Berhasil Menambahkan User']);
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
    public function edit(StoreUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->user_access = $request->jabatanName;
            $user->bidang_id = $request->bidangName;
            $user->save();

            return redirect()->route('admin.user')->with(['msg' => 'Berhasil Mengedit User']);
        }

        return redirect()->route('admin.user')->with(['errorMsg' => 'ID User Tidak Ditemukan']);
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
        $user = User::where('id', $id);

        if($user){
            $user->delete();
            return redirect()->route('admin.user')->with(['msg' => 'Berhasil Menghapus User']);
        }

        return redirect()->route('admin.user')->with(['errorMsg' => 'ID User Tidak Ditemukan']);
    }
}
