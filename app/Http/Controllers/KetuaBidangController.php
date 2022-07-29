<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('test_ketua_bidang', ['role' => 'Ketua Bidang']);
    }
}
