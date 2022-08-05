<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBidangRequest;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_index', ['role' => 'Admin']);
    }

    public function bidang(){
        return view('admin.admin_bidang', ['role' => 'Admin']);
    }

    public function user(){
        return view('admin.admin_user', ['role' => 'Admin']);
    }

    public function files(){
        return view('admin.admin_files', ['role' => 'Admin']);
    }
}
