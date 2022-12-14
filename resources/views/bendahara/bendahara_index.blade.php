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
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Total Biaya</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Pengaju</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Verifikator</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Ketua Harian</a>
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
                        id="projectApproved">

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
                        <span class="h4 mb-0 mr-3">Surat Bayar yang Dikirim ke Ketua Harian</span>
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
                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-project">Total Biaya</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Pengaju</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Verifikator</a>
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
                        id="proposalSend">
                    
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
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
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
        const divProposalSend = document.getElementById('proposalSend')
        let data = {!! $proposal_send_to_ketuaBidang !!}
        let dollarUSLocale = Intl.NumberFormat('en-US');
        console.log(data)
        let tagProposalSend = ''
        if(data.length != 0){
            data.forEach((x) => {

                let urlProposalDownload = '{{ route("bendahara.download", ["id" => ":id"])}}';
                urlProposalDownload = urlProposalDownload.replace(":id", x.id)

                let urlDownloadLembarVerifikasi = '{{ route("bendahara.download_lembarVerifikasi", ["id"=>":id"])}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.id)
                 

                let urlUploadSuratBayar = '{{ route("bendahara.upload_suratBayar", ["id" => "data_id", "data" => "data_data"]) }}';
                urlUploadSuratBayar = urlUploadSuratBayar.replace('data_id', x.id);
                urlUploadSuratBayar = urlUploadSuratBayar.replace('data_data', x.kegiatan.name);

                let urlDownloadSuratBayar = '{{ route("bendahara.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
                let suratbayar = x.filename.replace('proposal', 'surat bayar')
                console.log(suratbayar)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', suratbayar)
                
                if(x.suratbayar == null){
                    tagProposalSend +=
                    `<tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project h5" href="${urlProposalDownload}"><strong>${x.kegiatan.name}</strong></a>
                                    </div>
                                </div>
                            </div>
            
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong></strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>${x.verifikator.name}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                
                            <a class="btn btn-success" href="${urlProposalDownload}"><i class="material-icons icon--left">launch</i><strong>Download Proposal</strong></a>
                            <br>
                            <br>
                            <a class="btn btn-accent" href="${urlDownloadLembarVerifikasi}"><i class="material-icons icon--left">launch</i><strong>Download Lembar Verifikasi</strong></a>
                            <br>
                            <br>
                            
                            
                        </td>  
                    </tr>`
                }else{
                    tagProposalSend +=
                    `<tr>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <a class="js-lists-values-project h5" href="${urlProposalDownload}"><strong>${x.kegiatan.name}</strong></a>
                                    </div>
                                </div>
                            </div>
            
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong></strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>${x.verifikator.name}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-success" href="${urlProposalDownload}"><i class="material-icons icon--left">launch</i><strong>Download Proposal</strong></a>
                            <br>
                            <br>
                            <a class="btn btn-accent" href="${urlDownloadLembarVerifikasi}"><i class="material-icons icon--left">launch</i><strong>Download Lembar Verifikasi</strong></a>
                            <br>
                            <br>
                            
                        </td>  
                    </tr>`
                }
            })
        }else{
            tagProposalSend +=
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

        divProposalSend.innerHTML = tagProposalSend

        const divProposalApproved = document.getElementById('projectApproved')
        let proposalApproved = {!! $proposal_approved !!}
        console.log(proposalApproved)
        let tagProposalApproved = ''
        if(proposalApproved.length != 0){
            proposalApproved.forEach((x) => {
                let urlDownloadLembarVerifikasi = '{{ route("bendahara.download_lembarVerifikasi", ["id"=>":id"])}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.id)

                let urlProposalDownload = '{{ route("bendahara.download", ["id" => ":id"])}}';
                urlProposalDownload = urlProposalDownload.replace(":id", x.id)

                 

                let urlUploadSuratBayar = '{{ route("bendahara.upload_suratBayar", ["id" => "data_id", "data" => "data_data"]) }}';
                urlUploadSuratBayar = urlUploadSuratBayar.replace('data_id', x.id);
                urlUploadSuratBayar = urlUploadSuratBayar.replace('data_data', x.kegiatan.name);

                let urlDownloadSuratBayar = '{{ route("bendahara.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
                let suratbayar = x.filename.replace('proposal', 'surat bayar')
                console.log(suratbayar)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', suratbayar)
            
                tagProposalApproved +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <a class="js-lists-values-project h5" href="${urlProposalDownload}"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>Rp. ${dollarUSLocale.format(x.kegiatan.budget)}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5" ><strong></strong></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5" ><strong>${x.verifikator.name}</strong></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                            <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <div class="js-lists-values-project h5" ><strong>${x.ketua_harian.name}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    <td>
                        <a class="btn btn-success" href="${urlProposalDownload}"><i class="material-icons icon--left">launch</i><strong>Download Proposal</strong></a>
                        <br>
                        <br>
                        <a class="btn btn-accent" href="${urlDownloadLembarVerifikasi}"><i class="material-icons icon--left">launch</i><strong>Download Lembar Verifikasi</strong></a>
                        <br>
                        <br>
                        
                    </td>  
                </tr>`
                
            })
        }else{
            tagProposalApproved +=
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

        divProposalApproved.innerHTML = tagProposalApproved



        function clickMe(){
            const inputTag = document.getElementById('iniFile')
            const labelForm = document.getElementById('labelForm')
            const formData = document.getElementById('uploadDoc')

            document.getElementById('btnClick').click();
        }
        
    </script>
    @endsection