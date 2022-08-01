<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('bendahara.bendahara_index', ['role' => 'Bendahara']);
    }
}
