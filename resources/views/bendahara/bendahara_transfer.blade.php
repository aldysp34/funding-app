@extends('layouts.layout')

    @section('title', 'Dashboard')

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
                        <span class="h4 mb-0 mr-3">Riwayat Transfer</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive"
                data-toggle="lists"
                data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true"
                data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

            <table class="table mb-0 thead-border-top-0 table-nowrap data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Nama Penerima</a>
                        </th>
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Alamat Penerima</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">NPWP Penerima</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Nomor Rekening</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Bank</a>
                        </th>
                        <th style="width: 20px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Bukti Transfer</a>
                        </th>
                        
                        
                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list">

                </tbody>
            </table>
        </div>
        <div class="col-auto">
            <a href="{{route('bendahara.uploadTF')}}" class="btn btn-primary">Tambah Bukti Transfer Baru</a>
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
        $(function(){
            let table = $('.data-table').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{route('bendahara.transfer')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data:'nama_penerima', name: 'nama_penerima'},
                    {data: 'alamat_penerima', name: 'alamat_penerima'},
                    {data: 'npwp_penerima', name: 'npwp_penerima'},
                    {data: 'rekening_penerima', name: 'rekening_penerima'},
                    {data: 'bank', name: 'bank'},
                    {data:'bukti_transfer', name:'bukti_transfer', orderable:false, searchable:false}
                ]
            })
        })
    </script>
    @endsection