@extends('layouts.layout')

    @section('title', 'Upload Dokumen')

    @section('content-header')
    <h2 class="mb-0">Selamat Datang {{auth()->user()->name}}</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)
    @if(isset(auth()->user()->bidang->name))
        @section('bidang', auth()->user()->bidang->name)
    @endif
    
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
        <form action="{{ route('ketua-bidang.store_dokumen') }}" class="col-md-5 p-0 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="kegiatan_id" value="{{$kegiatan->id}}" style="display:none">
            
            <div class="form-group">
                <label for="budget" class="form-label">Anggaran</label>
                <input type="number" name="budget" id="budget" required autofocus placeholder="Volume..." value="{{ $kegiatan->budget }}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="budegt2" class="form-label">Anggaran Yang Diajukan</label>
                <input type="number" name="budget_2" id="budget_2" required autofocus placeholder="Volume...">
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
            <br>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="{{route('ketua-bidang.upload_lpj')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">folder</span> 
                    <span class="sidebar-menu-text">LPJ</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>
        
        const filename = document.getElementById('filename')
        function clickme(){
            let data = $('input[type=file]').val()
            data = data.split("\\");
            document.getElementById('filename').innerHTML = data[2]
        }

        const jumlah = document.getElementById('jumlahInput');
        const hargaSatuan = document.getElementById('hargaSatuan');
        const volume_1 = document.getElementById('volume_1');
        const volume_2 = document.getElementById('volume_2');
        const volume_3 = document.getElementById('volume_3');

        volume_1.addEventListener('keyup', sum);
        volume_2.addEventListener('keyup', sum);
        volume_3.addEventListener('keyup', sum);
        hargaSatuan.addEventListener('keyup', sum);
        function sum(e){
            const jum = ($('#volume_1').val())*($('#volume_2').val())*($('#volume_3').val())*($('#hargaSatuan').val());

            jumlah.value = jum
        }

        const kegiatanName = document.getElementById('name');
        kegiatanName.addEventListener('change', getData);
        function getData(e){
            let kegiatanData = {!! $kegiatan !!}
            console.log(kegiatanData);
            console.log(kegiatanName.value);
            kegiatanData.forEach((x) => {
                if(x.name == kegiatanName.value){
                    
                }
            })
        }   
    </script>
    @endsection
