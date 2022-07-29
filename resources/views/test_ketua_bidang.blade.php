@extends('layouts.layout')

    @section('title', 'Ini Ketua Bidang')

    @section('content-header')
    <h2 class="mb-0">Ketua Bidang</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)
    
    @section('content-section')
        Ini content Ketua Bidang
    @endsection

    @section('content-footer')
        Ini footer Content Ketua Bidang
    @endsection
    @section('sidebar-content')
        Ini sidebar Ketua Bidang
    @endsection
