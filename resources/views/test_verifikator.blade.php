@extends('layouts.layout')

    @section('title', 'Ini Verifikator')

    @section('content-header')
        <h2 class="mb-0">Verifikator</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)

    @section('content-section')
        Ini content Verifikator
    @endsection

    @section('content-footer')
        Ini footer Content Verifikator
    @endsection
    @section('sidebar-content')
        Ini sidebar Verifikator
    @endsection