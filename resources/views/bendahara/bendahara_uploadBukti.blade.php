@extends('layouts.layout')

    @section('title', 'Upload Dokumen')

    @section('content-header')
    <h2 class="mb-0">Selamat Datang {{auth()->user()->name}}</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)
    @section('bidang', auth()->user()->bidang->name)
    
    @section('content-section')
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
    @endif
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
        <form action="{{route('bendahara.uploadBukti')}}" class="col-md-5 p-0 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_penerima" class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" name="nama_penerima" required autofocus placeholder="Nama Penerima" id="">
            </div>
            <div class="form-group">
                <label for="alamat_penerima" class="form-label">Alamat Penerima</label>
                <input type="text" class="form-control" name="alamat_penerima" required autofocus placeholder="Alamat Penerima" id="">
            </div>
            <div class="form-group">
                <label for="npwp_penerima" class="form-label">NPWP Penerima</label>
                <input type="text" class="form-control" name="npwp_penerima" required autofocus placeholder="NPWP Penerima" id="">
            </div>
            <div class="form-group">
                <label for="bank" class="form-label">Bank Penerima</label>
                <select name="bank" id="" class="form-control" data-toggle="select">
                @foreach($banks as $x)
                    <option value="{{$x->id}}">{{$x->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rekening_penerima" class="form-label">Nomor Rekening</label>
                <input type="text" class="form-control" name="rekening_penerima" required autofocus placeholder="Nomor Rekening" id="">
            </div>
            <div class="form-group">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" class="form-control" name="nominal" id="" required autofocus placeholder="Nominal..">
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Tanggal Transaksi</label>
                <input type="date" id="date" name="date" class="form-control">
            </div>
            <div class="form-group m-0">
                <label for="file" class="form-label">Bukti Transfer</label>
                <div class="custom-file">
                    <input type="file" name="file" id="iniFile" class="custom-file-input" onchange="clickme()">
                    <label for="file" class="custom-file-label" id="filename">Choose File</label>
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
                <a href="{{route('bendahara.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
                <a href="{{route('bendahara.transfer')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">folder</span> 
                    <span class="sidebar-menu-text">Transfer</span>
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
    </script>
    @endsection
