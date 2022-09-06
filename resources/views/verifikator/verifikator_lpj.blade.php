@extends('layouts.layout')

    @section('title', 'Dashboard')

    @section('content-header')
    <h2 class="mb-0">Selamat Datang {{auth()->user()->name}}</h2>
    @endsection

    @section('name', auth()->user()->name)

    @section('role', $role)
    @if(isset(auth()->user()->bidang->name))
        @section('bidang', auth()->user()->bidang->name)
    @endif

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
                        <span class="h4 mb-0 mr-3">LPJ yang diajukan</span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="table-responsive"
                data-toggle="lists"
                data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true"
                data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

            <table class="table mb-0 thead-border-top-0 table-nowrap data-table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Bidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
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
                        <span class="h4 mb-0 mr-3">LPJ yang Disetujui</span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="table-responsive"
                data-toggle="lists"
                data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true"
                data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

            <table class="table mb-0 thead-border-top-0 table-nowrap data-table-2">
            <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Bidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
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
                        <span class="h4 mb-0 mr-3">LPJ yang Ditolak</span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="table-responsive"
                data-toggle="lists"
                data-lists-sort-by="js-lists-values-date"
                data-lists-sort-desc="true"
                data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>

            <table class="table mb-0 thead-border-top-0 table-nowrap data-table-3">
            <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Bidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
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
                <a href="{{route('verifikator.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
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
        $(function(){
            let table_1 = $('.data-table-1').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('verifikator.approveReject') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'bidang', name: 'bidang'},
                    {data:'action', name:'action', orderable:false, searchable:false}
                ]
            })
        })
        $(function(){
            let table_2 = $('.data-table-2').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('verifikator.approvedLpj') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'bidang', name: 'bidang'},
                    {data:'action', name:'action', orderable:false, searchable:false}
                ]
            })
        })

        $(function(){
            let table_2 = $('.data-table-3').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('verifikator.rejectedLpj') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'bidang', name: 'bidang'},
                    {data:'action', name:'action', orderable:false, searchable:false}
                ]
            })
        })

        function clickMe(){
            const inputTag = document.getElementById('iniFile')
            const labelForm = document.getElementById('labelForm')
            const formData = document.getElementById('uploadDoc')

            document.getElementById('btnClick').click();
        }

    </script>
    @endsection