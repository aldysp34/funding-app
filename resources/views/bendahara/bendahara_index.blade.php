@extends('layouts.layout')

    @section('title', 'Dashboard')

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
                        <span class="h4 mb-0 mr-3">Surat Bayar yang Dikirim ke Ketua Bidang</span>
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

            <table class="table mb-0 thead-border-top-0 table-nowrap">
                <thead>
                    <tr>
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Proposal</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Status</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Pilihan</a>
                        </th>
                        
                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list"
                        id="projects">
                    <tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-primary text-white">SM</span>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project" href="{{route('login')}}"><strong>Social Media API</strong></a>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <small class="js-lists-values-status text-50 mb-4pt">Dalam Proses</small>
                                <span class="indicator-line rounded bg-warning"></span>
                            </div>
                        </td>
                        <td>
                            <div class="button-list">
                                <button type="button" class="btn btn-accent">
                                <i class="material-icons icon--left">launch</i>
                                Download
                                </button>
                                <button type="button" class="btn btn-primary">
                                <i class="material-icons icon--left">close</i>
                                Reject
                                </button>
                                <button type="button" class="btn btn-success">
                                <i class="material-icons icon--left">close</i>
                                Reject
                                </button>
                            </div>
                        </td>  
                    </tr>
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
                        <span class="h4 mb-0 mr-3">Surat Bayar yang Di Approve</span>
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

            <table class="table mb-0 thead-border-top-0 table-nowrap">
                <thead>
                    <tr>
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Proposal</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Status</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Pilihan</a>
                        </th>
                        
                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list"
                        id="projects">
                    <tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project h5" href="{{route('login')}}"><strong>Social Media API</strong></a>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <small class="js-lists-values-status text-50 mb-4pt">Dalam Proses</small>
                                <span class="indicator-line rounded bg-warning"></span>
                            </div>
                        </td>
                        <td>
                            <div class="button-list">
                                <button type="button" class="btn btn-accent">
                                <i class="material-icons icon--left">launch</i>
                                Download
                                </button>
                                <button type="button" class="btn btn-primary">
                                <i class="material-icons icon--left">close</i>
                                Reject
                                </button>
                                <button type="button" class="btn btn-success">
                                <i class="material-icons icon--left">close</i>
                                Reject
                                </button>
                            </div>
                        </td>  
                    </tr>
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
            <li class="sidebar-menu-item active">
                <a href="{{route('bendahara.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>console.log('ini buat nambahin script')</script>
    @endsection