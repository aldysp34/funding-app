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
                        <span class="h2 mb-0 mr-3">Pengajuan Proposal</span>
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
                        <span class="h2 mb-0 mr-3">Proposal yang Dibatalkan</span>
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
                        id="projectsCancelled">
                        
                    
                    
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
                <a href="{{route('ketua-bidang.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
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
                <a href="{{route('ketua-bidang.upload_dokumen')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">folder</span> 
                    <span class="sidebar-menu-text">LPJ</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>
        let data = {!! $proposal_submit !!}
        console.log(data)
        let tagHTML = ''
        const batal = document.getElementById('batal')
        const divProjects = document.getElementById("projects")
        let color = (y) => {
            if(y === 1){
                return 'accent'
            }else if(y === 2){
                return 'danger'
            }else if(y === 3){
                return 'warning'
            }else{
                return 'danger';
            }
        };
        let status = (y) => {
            if(y === 1){
                return 'Disetujui'
            }else if(y === 2){
                return 'Ditolak'
            }else if(y === 3){
                return 'Dalam Proses'
            }else{
                return 'Dibatalkan';
            }
        }
        let style = (y) => {
            if(y === 1){
                return 'style="display:none"'
            }
        }
        let styleButton = (y) => {
            if(y !== 1){
                return 'style="display:none"'
            }
        }
        data.forEach((x) => {
            let url = '{{ route("ketua-bidang.download", ["id" => ":id"])}}';
            url = url.replace(":id", x.id)
            

            let urlDownloadSuratBayar = '{{ route("ketua-bidang.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
            urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
            urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
            urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', x.filename)
            
            let urlCancelSubmit = '{{ route("ketua-bidang.cancel", ":id")}}';
            urlCancelSubmit = urlCancelSubmit.replace(':id', x.id);

            let urlBatal = ''
            tagHTML += `
            <tr>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <a class="js-lists-values-project h5" href="${url}"><strong>${x.kegiatan.name}</strong></a>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="d-flex flex-column">
                        <small class="js-lists-values-status text-50 mb-4pt">${status(x.status)}</small>
                        <span class="indicator-line rounded bg-${color(x.status)}"></span>
                    </div>
                </td>
                <td>
                    <div class="button-list">
                        <a type="button" class="btn btn-accent" href="${urlDownloadSuratBayar}" ${styleButton(x.status)}>
                        <i class="material-icons icon--left">launch</i>
                        Download Surat Bayar
                        </a>
                        <a type="button" class="btn btn-danger" href="${urlCancelSubmit}" ${style(x.status)}>
                        <i class="material-icons icon--left">close</i>
                        Batal Ajukan
                        </a>
                    </div>
                </td>  
            </tr>
            `

        })
        divProjects.innerHTML = tagHTML

        const divProjectsCancel = document.getElementById('projectsCancelled')
        let cancelData = {!! $proposal_cancel !!};
        let tagCancel = '';

        cancelData.forEach((x) => {
            let url = '{{ route("ketua-bidang.download", ["id" => ":id"])}}';
            url = url.replace(":id", x.id)

            tagCancel += `
            <tr>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <a class="js-lists-values-project h5" href="${url}"><strong>${x.kegiatan.name}</strong></a>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="d-flex flex-column">
                        <small class="js-lists-values-status text-50 mb-4pt">${status(x.ajukan_status)}</small>
                        <span class="indicator-line rounded bg-${color(x.ajukan_status)}"></span>
                    </div>
                </td>
                <td>
                    <div class="button-list">
                        <a type="button" class="btn btn-accent" href="${url}">
                        <i class="material-icons icon--left">launch</i>
                        Download Proposal
                        </a>
                    </div>
                </td>  
            </tr>
            `
        });
        divProjectsCancel.innerHTML = tagCancel

    </script>
    @endsection
