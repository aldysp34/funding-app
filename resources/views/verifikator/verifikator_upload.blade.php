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
        <form action="{{ route('verifikator.upload_lembarVerifikasi', ['id' => $kegiatan->file->id,'data' => $kegiatan->name]) }}" class="col-md-5 p-0 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="kegiatan_id" value="{{$kegiatan->id}}" style="display:none">
            
            <div class="form-group">
                <label for="name" class="form-label">Nama Kegiatan</label>
                <select name="name" id="name" class="form-control" data-toggle="select">
                    <option value="{{$kegiatan->name}}">{{$kegiatan->name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="budget" class="form-label">Anggaran</label>
                <input type="number" name="budget" id="budget" required autofocus placeholder="Volume..." value="{{ $kegiatan->budget }}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="volume_1" class="form-label">Volume 1</label>
                <input type="number" name="volume_1" id="volume_1" required autofocus placeholder="Volume..." value="1">
            </div>
            <div class="form-group">
                <label class="form-label"
                        for="satuan_1">Satuan</label>
                <select id=""
                        name="satuan_1"
                        data-toggle="select"
                        class="form-control"
                        readonly="readonly">
                        <option id="option_1" value="{{ $kegiatan->rincianBiaya->satuan_1 }}">{{ $kegiatan->rincianBiaya->satuan_1 }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="volume_2" class="form-label">Volume 2</label>
                <input type="number" name="volume_2" id="volume_2" required autofocus placeholder="Volume..." value='1'>
            </div>
            <div class="form-group">
                <label for="satuan_2" class="form-label">Satuan</label>
                <select name="satuan_2" id="satuan_2" class="form-control" data-toggle="select" readonly="readonly">
                    <option id="option_2" value="{{ $kegiatan->rincianBiaya->satuan_2 }}">{{ $kegiatan->rincianBiaya->satuan_2 }}</option>

                </select>   
            </div>
            <div class="form-group">
                <label for="volume_3" class="form-label">Volume 3</label>
                <input type="number" name="volume_3" id="volume_3" required autofocus placeholder="Volume..." value='1'> 
            </div>
            <div class="form-group">
                <label class="form-label"
                        for="satuan_3">Satuan</label>
                <select id="satuan_3"
                        name="satuan_3"
                        data-toggle="select"
                        class="form-control"
                        readonly="readonly">
                        <option id="option_3" value="{{ $kegiatan->rincianBiaya->satuan_3 }}">{{$kegiatan->rincianBiaya->satuan_3}}</option>

                </select>
            </div>
            <div class="form-group">
                <label for="harga_satuan" class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" id="hargaSatuan" required autofocus placeholder="Harga Satuan..." value="{{$kegiatan->rincianBiaya->harga_satuan}}" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="jumlah" class="form-label">Total </label>
                <input type="number" name="jumlah" id="jumlahInput" required autofocus placeholder="Total" value="{{$kegiatan->rincianBiaya->jumlah}}" readonly="readonly">
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
                <a href="{{route('verifikator.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item ">
                <a href="{{route('verifikator.dashboard_lpj')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
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
        let data = {!!$kegiatan !!}
        console.log(data)

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
