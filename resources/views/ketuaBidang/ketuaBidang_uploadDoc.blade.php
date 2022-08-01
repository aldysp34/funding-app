@extends('layouts.layout')

    @section('title', 'Upload Dokumen')

    @section('content-header')
    <h2 class="mb-0">Selamat Datang {{auth()->user()->name}}</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)
    @section('bidang', auth()->user()->bidang->name)
    
    @section('content-section')
    <div class="card dashboard-area-tabs mb-32pt">
        <div class="card-header p-0 nav">
            <div class="row no-gutters"
                    role="tablist">
                <div class="col-auto">
                    <div
                        data-toggle="tab"
                        role="tab"
                        aria-selected="true"
                        class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start active">
                        <span class="h2 mb-0 mr-3">Pengajuan Proposal Baru</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if($errors->any())
        <div class="alert alert-warning mb-0"
                role="alert">
            <div class="d-flex flex-wrap align-items-start">
                <div class="mr-8pt">
                    <i class="material-icons">access_time</i>
                </div>
                <div class="flex"
                        style="min-width: 180px">
                    <small class="text-black-100">
                        <strong>Warning!</strong> {{ $errors->first() }}
                    </small>
                </div>
            </div>
        </div>
        @elseif(session()->has('msg'))
        <div class="alert alert-accent mb-0"
                role="alert">
            <div class="d-flex flex-wrap align-items-start">
                <div class="mr-8pt">
                    <i class="material-icons">check</i>
                </div>
                <div class="flex"
                        style="min-width: 180px">
                    <small class="text-black-100">
                        <strong>Well Done!</strong> {{session()->get('msg')}}
                    </small>
                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('ketua-bidang.store_dokumen') }}"
                class="col-md-5 p-0 mx-auto" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="form-label"
                        for="subject">Subject:</label>
                <input id="subject" type="text" class="form-control " name="subject" required autofocus placeholder="Subject Dokumen.." >
            </div>
            <div class="form-group m-0">
                <div class="custom-file">
                    <input type="file"
                            id="file"
                            class="custom-file-input" name="file" id="iniFile" onchange="clickme()">
                    <label for="file"
                            class="custom-file-label" id="filename">Choose file</label>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-accent" type="submit">Upload</button>
            </div>
        </form>
    
    @endsection

    @section('sidebar-content')
    <div class="sidebar-brand ">
        <img class="sidebar-brand-icon"
                src="{{asset('assets/images/kabBekasi.svg')}}"
                alt="Huma">
        <span>PORDA</span>
        <span>KABUPATEN</span>
        <span>BEKASI</span>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="{{route('ketua-bidang.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
                <a href="{{route('ketua-bidang.upload_dokumen')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">folder</span> 
                    <span class="sidebar-menu-text">Proposal</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>
        const filename = document.getElementById('filename')
        function clickme(){
            let data = $('input[type=file').val()
            data = data.split("\\");
            document.getElementById('filename').innerHTML = data[2]
        }
    </script>
    @endsection
