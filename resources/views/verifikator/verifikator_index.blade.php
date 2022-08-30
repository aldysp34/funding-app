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
                        <span class="h4 mb-0 mr-3">Proposal yang diajukan</span>
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
                        
                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Total Biaya</a>
                        </th>

                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Diajukan Oleh</a>
                        </th>

                        <th style="width: 150px;">
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
                        <span class="h4 mb-0 mr-3">Proposal yang Disetujui</span>
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
                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Total Biaya</a>
                        </th>
                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Diajukan Oleh</a>
                        </th>

                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list"
                        id="approvedProjects">
                    
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
                        <span class="h4 mb-0 mr-3">Proposal yang Ditolak</span>
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
                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Total Biaya</a>
                        </th>
                        <th style="width: 100px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-budget">Diajukan Oleh</a>
                        </th>

                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list"
                        id="rejectedProjects">
                    
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
                <a href="{{route('verifikator.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>
        let data = {!! $proposal !!}
        console.log(data)
        const firstDivProjects = document.getElementById('projects')
        let tagHTML = ''
        let dollarUSLocale = Intl.NumberFormat('en-US');
        if(data.length != 0){
            data.forEach((x) => {
                
                let urlDownload = '{{ route("verifikator.download", ["id" => ":id"])}}';
                urlDownload = urlDownload.replace(":id", x.id)
                let urlApprove = '{{ route("verifikator.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlApprove = urlApprove.replace('data_id', x.id);
                urlApprove = urlApprove.replace('data_data', 1);
    
                let urlReject = '{{ route("verifikator.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlReject = urlReject.replace('data_id', x.id);
                urlReject = urlReject.replace('data_data', 2);

                
    
                tagHTML +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <a class="js-lists-values-project h5" href="${urlDownload}"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong></strong></div>
                                </div>
                            </div>
                        </div>
    
                    </td>
                    <td>
                        <div class="button-list">
                            <a class="btn btn-accent" href="${urlDownload}">
                                <i class="material-icons icon--left">launch</i>
                                Download File
                            </a>
                            <a class="btn btn-accent" href="${urlApprove}">
                                <i class="material-icons icon--left">check</i>
                                Approve
                            </a>
                            <a class="btn btn-danger" href="${urlReject}">
                                <i class="material-icons icon--left">close</i>
                                Reject
                            </a>
                        </div>
                    </td>  
                </tr>`
            })
        }else{
            tagHTML +=
            `<tr>
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
            </tr>`
        }
        firstDivProjects.innerHTML = tagHTML

        let approvedData = {!! $approvedProposal !!}
        console.log(approvedData);
        const approvedDivProjects = document.getElementById('approvedProjects');
        let tagApprovedHTML = ''
        if(approvedData.length != 0){
            approvedData.forEach((x) => {
                let urlApprovedDownload = '{{ route("verifikator.download", ["id" => ":id"])}}';
                urlApprovedDownload = urlApprovedDownload.replace(":id", x.id)
                
                
                let urlUploadLembarVerifikasi = '{{ route("verifikator.upload_detail", ["id" => "data_id"]) }}'
                urlUploadLembarVerifikasi = urlUploadLembarVerifikasi.replace('data_id', x.kegiatan.id);
                console.log()

                let urlDownloadLembarVerifikasi = ''
                
                if(x.lembar_verifikasi){
                    urlDownloadLembarVerifikasi = '{{ route("verifikator.download_lembarVerifikasi", ["id"=>":id"])}}';
                    urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.lembar_verifikasi.id)
                }

                if(x.lembar_verifikasi == null){
                    tagApprovedHTML +=
                    `<tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project h5" href="${urlApprovedDownload}"><strong>${x.kegiatan.name}</strong></a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5"><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5"><strong></strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="button-list">
                                <a class="btn btn-accent" href="${urlApprovedDownload}">
                                    <i class="material-icons icon--left">launch</i>
                                    Download File
                                </a>
                                
                                <a class="btn btn-primary" href="${urlUploadLembarVerifikasi}"> Upload Lembar Verifikasi</a>
                            </div>
                        </td>  
                    </tr>`
                }else{
                    tagApprovedHTML +=
                    `<tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project h5" href="${urlApprovedDownload}"><strong>${x.kegiatan.name}</strong></a>
                                    </div>
                                </div>
                            </div>
        
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5"><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5"><strong></strong></div>
                                    </div>
                                </div>
                            </div>
        
                        </td>
                        <td>
                            <div class="button-list">
                                <a class="btn btn-accent" href="${urlApprovedDownload}">
                                    <i class="material-icons icon--left">launch</i>
                                    Download File
                                </a>
                                <a class="btn btn-secondary" href="${urlDownloadLembarVerifikasi}">
                                    <i class="material-icons icon--left">business_center</i>
                                    Download Lembar Verifikasi
                                </a>
                            </div>
                        </td>  
                    </tr>`
                }
            })
        }else{
            tagApprovedHTML +=
            `<tr>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5""><strong>Tidak Ada Data</strong></div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>`
        }
        approvedDivProjects.innerHTML = tagApprovedHTML

        let rejectedData = {!! $rejectedProposal !!}
        console.log(rejectedData);
        const rejectedDivProjects = document.getElementById('rejectedProjects');
        let tagRejectedHTML = ''
        if(rejectedData.length != 0){
            rejectedData.forEach((x) => {
                let urlRejectedDownload = '{{ route("verifikator.download", ["id" => ":id"])}}';
                urlRejectedDownload = urlRejectedDownload.replace(":id", x.id)
                tagRejectedHTML +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <a class="js-lists-values-project h5" href="${urlRejectedDownload}"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
    
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong></strong></div>
                                </div>
                            </div>
                        </div>
    
                    </td>
                    <td>
                        <div class="button-list">
                            <a class="btn btn-accent" href="${urlRejectedDownload}">
                                <i class="material-icons icon--left">launch</i>
                                Download File
                            </a>
                            
                        </div>
                    </td>  
                </tr>`
            })
        }else{
            tagRejectedHTML +=
            `<tr>
                <td>
                    <div class="media flex-nowrap align-items-center"
                            style="white-space: nowrap;">
                        <div class="media-body">
                            <div class="d-flex flex-column">
                                <div class="js-lists-values-project h5""><strong>Tidak Ada Data</strong></div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>`
        }
        rejectedDivProjects.innerHTML = tagRejectedHTML

        function clickMe(){
            const inputTag = document.getElementById('iniFile')
            const labelForm = document.getElementById('labelForm')
            const formData = document.getElementById('uploadDoc')

            document.getElementById('btnClick').click();
        }

    </script>
    @endsection