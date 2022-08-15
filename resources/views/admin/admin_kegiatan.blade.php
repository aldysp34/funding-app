@extends('layouts.layout')

@section('title', 'Kegiatan')

@section('content-header')
    <h2 class="mb-0">Selamat Datang {{auth()->user()->name}}</h2>

    @section('name', auth()->user()->name)

    @section('role', $role)
@endsection

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
    @elseif(session()->has('errorMsg'))
    <div class="alert alert-accent mb-0"
            role="alert">
        <div class="d-flex flex-wrap align-items-start">
            <div class="mr-8pt">
                <i class="material-icons">close</i>
            </div>
            <div class="flex"
                    style="min-width: 180px">
                <small class="text-black-100">
                    <strong>Well Done!</strong> {{session()->get('errorMsg')}}
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
                    <span class="h4 mb-0 mr-3">List Kegiatan    </span>
                </div>
            </div>
            
        </div>
    </div>

    <div class="table-responsive"
            data-toggle="lists"
            data-lists-sort-by="js-lists-values-date"
            data-lists-sort-desc="true"
            data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

        <table class="table mb-0 thead-border-top-0 table-nowrap">
            <thead>
                <tr>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Nama Kegiatan</a>
                    </th>

                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Bidang</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Volume 1</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Satuan 1</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Volume 2</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Satuan 2</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Volume 3</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Satuan 3</a>
                    </th>
                    <th style="width: 80px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Anggaran</a>
                    </th>
                    <th style="width: 80px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Pilihan</a>
                    </th>
                    <th style="width: 24px;"></th>
                </tr>
            </thead>
            <tbody class="list"
                    id="kegiatanList">
                
            </tbody>
        </table>
    </div>
</div>

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
                    <span class="h4 mb-0 mr-3">Buat Kegiatan Baru</span>
                </div>
            </div>
            
        </div>
    </div>

    <div class="table-responsive"
            data-toggle="lists"
            data-lists-sort-by="js-lists-values-date"
            data-lists-sort-desc="true"
            data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

        <table class="table mb-0 thead-border-top-0 table-nowrap">
            <div class="col-auto">
                <form action="{{ route('admin.store_kegiatan') }}"
                    class="col-md-5 p-0 mx-auto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="bidang" class="form-label">Bidang</label>
                        <select id=""
                                name="bidang"
                                data-toggle="select"
                                class="form-control">
                            @foreach($bidang as $x)
                                <option value="{{ $x->id }}">{{ $x->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"
                                for="name">Nama Kegiatan</label>
                        <input id="name" type="text" class="form-control " name="name" required autofocus placeholder="Nama Kegiatan..." >
                    </div>
                    <div class="form-group">
                        <label for="budget" class="form-label">Anggaran</label>
                        <input type="number" name="budget" id="budget" required autofocus placeholder="Volume..." value='1'>
                    </div>
                    <div class="form-group">
                        <label for="volume_1" class="form-label">Volume 1</label>
                        <input type="number" name="volume_1" id="volume_1" required autofocus placeholder="Volume..." value='1'>
                        
                    </div>
                    <div class="form-group">
                        <label class="form-label"
                                for="satuan_1">Satuan</label>
                        <select id=""
                                name="satuan_1"
                                data-toggle="select"
                                class="form-control">
                                <option>-</option>
                            @foreach($satuan as $x)
                                <option value="{{ $x->name }}">{{ $x->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="volume_2" class="form-label">Volume 2</label>
                        <input type="number" name="volume_2" id="volume_2" required autofocus placeholder="Volume..." value='1'>
                    </div>
                    <div class="form-group">
                        <label for="satuan_2" class="form-label">Satuan</label>
                        <select name="satuan_2" id="satuan_2" class="form-control" data-toggle="select">
                            <option>-</option>
                            @foreach($satuan as $x)
                                <option value="{{$x->name}}">{{$x->name}}</option>
                            @endforeach
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
                                class="form-control">
                                <option>-</option>
                            @foreach($satuan as $x)
                                <option value="{{ $x->name }}">{{ $x->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_satuan" class="form-label">Harga Satuan</label>
                        <input type="text" name="harga_satuan" id="hargaSatuan">
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlahInput" readonly="readonly" />
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                    
                </form>
            </div>
            
        </table>
    </div>
</div>

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
            <a href="{{route('admin.home')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                <span class="sidebar-menu-text">Dashboard</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-heading">
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{route('admin.user')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people_outline</span>
                <span class="sidebar-menu-text">User</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-heading">
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item active">
            <a href="{{route('admin.bidang')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">view_compact</span>
                <span class="sidebar-menu-text">Bidang</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-heading">
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{route('admin.files')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">content_copy</span>
                <span class="sidebar-menu-text">Files</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-heading">
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{route('admin.kegiatan')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">content_copy</span>
                <span class="sidebar-menu-text">Kegiatan</span>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('new_scripts')
<script>
    const divKegiatanList = document.getElementById('kegiatanList');
    let data = {!! $kegiatan !!}
    console.log(data)

    let tagKegiatanList = ''
    if(data.length != 0){
        data.forEach((x) => {
            let urlDestroy = '{{ route("admin.destroy_bidang", ":id")}}';
            urlDestroy = urlDestroy.replace(':id', x.id);
            
            console.log()
            tagKegiatanList += `
            <tr>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.name}</strong></div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.bidang.name}</strong></div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.volume_1??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.satuan_1??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.volume_2??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.satuan_2??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.volume_3??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.rincian_biaya?.satuan_3??'-'}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5"><strong>${x.budget}</strong></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="button-list">
                        <form method="POST" action="${urlDestroy}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>`
        })
    }else{
        tagKegiatanList += `
        <tr>
            <td>
                <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>Tidak Ada Data</strong></div>
                                </div>
                            </div>
                </div>
            </td>
        </tr>
        `
    }
    divKegiatanList.innerHTML = tagKegiatanList

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

    

</script>

@endsection