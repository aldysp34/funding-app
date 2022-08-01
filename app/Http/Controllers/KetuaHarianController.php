<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetuaHarianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('ketuaHarian.ketuaHarian_index', ['role' => 'Ketua Harian']);
    }
}
