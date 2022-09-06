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
    <div class="row mb-lg-8pt">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="h2 mb-0 mr-3">{{$count_proposal}}</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Proposal Yang di Approve</strong></p>
                    </div>
                    <i class="material-icons icon-48pt text-20 ml-2">content_copy</i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="h2 mb-0 mr-3">Rp. {{$jumlah}}</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Jumlah Total Biaya yang di Approve</strong></p>
                        
                    </div>
                    <i class="material-icons icon-48pt text-20 ml-2">attach_money</i>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="h2 mb-0 mr-3">8.3k</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Visits</strong></p>
                        <p class="text-50 mb-0 mt-n1 d-flex align-items-center">
                            3.5%
                            <i class="material-icons ml-4pt icon-16pt text-accent-red">keyboard_arrow_down</i>
                        </p>
                    </div>
                    <i class="material-icons icon-48pt text-20 ml-2">person_outline</i>
                </div>
            </div>
        </div> -->

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
                        <span class="h4 mb-0 mr-3">Pengajuan Proposal</span>
                        
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
                                data-sort="js-lists-values-status">Kategori</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Bidang</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Verifikator</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Anggaran</a>
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
                        id="proposalApproving">
                    
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
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Kategori</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Bidang</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Verifikator</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Anggaran</a>
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
                        id="proposalApproved">
                    
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
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Kategori</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Bidang</a>
                        </th>
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Verifikator</a>
                        </th>
                        
                        <th style="width: 48px;">
                            <a href="javascript:void(0)"
                                class="sort"
                                data-sort="js-lists-values-status">Anggaran</a>
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
                        id="proposalRejected">
                    
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
                <a href="{{route('ketua-harian.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="{{route('ketua-harian.dashboard_lpj')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">LPJ</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script>
        const divProposalApproving = document.getElementById('proposalApproving');
        let dataProposalApproving = {!! $proposal_need_approved !!}
        let tagProposalApproving = ''
        let dollarUS = Intl.NumberFormat('en-US');
        console.log(dataProposalApproving)
        if(dataProposalApproving.length != 0){
            dataProposalApproving.forEach((x) => {
                
                let urlDownloadLembarVerifikasi = '{{ route("ketua-harian.download_lembarVerifikasi", ["id"=>":id"])}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.id)

                let urlDownloadProposal = '{{ route("ketua-harian.download", ["id" => ":id"])}}';
                urlDownloadProposal = urlDownloadProposal.replace(":id", x.id)


                let urlDownloadSuratBayar = '{{ route("ketua-harian.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
                let suratbayar = x.filename.replace('proposal', 'surat bayar')
                console.log(suratbayar)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', suratbayar)


                

                let urlApprove = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlApprove = urlApprove.replace('data_id', x.id);
                urlApprove = urlApprove.replace('data_data', 1);
    
                let urlReject = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlReject = urlReject.replace('data_id', x.id);
                urlReject = urlReject.replace('data_data', 2);

                tagProposalApproving +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.bidang.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>${x.verifikator.name}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>Rp. ${dollarUS.format(x.kegiatan.budget)}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="button-list">
                            <a type="button" class="btn btn-accent" href="${urlDownloadProposal}">
                                <i class="material-icons icon--left">launch</i>
                                Download Proposal
                            </a>
                            <a type="button" class="btn btn-primary" href="${urlDownloadLembarVerifikasi}">
                                <i class="material-icons icon--left">launch</i>
                                Download Lembar Verifikasi
                            </a>
                            
                        </div>
                        <div class="button-list">
                            <a type="button" class="btn btn-primary" href="${urlApprove}">
                                <i class="material-icons icon--left">star</i>
                                Setujui
                            </a>
                            <a type="button" class="btn btn-danger" href="${urlReject}">
                                <i class="material-icons icon--left">close</i>
                                Tolak
                            </a>
                        </div>
                    </td>  
                </tr>`
            })
        }else{
            tagProposalApproving +=
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
        divProposalApproving.innerHTML = tagProposalApproving

        const divProposalApproved = document.getElementById('proposalApproved');
        let dataProposalApproved = {!! $proposal_approved !!}
        let tagProposalApproved = ''
        console.log(dataProposalApproved)
        if(dataProposalApproved.length != 0){
            dataProposalApproved.forEach((x) => {
                
                let urlDownloadLembarVerifikasi = '{{ route("ketua-harian.download_lembarVerifikasi", ["id"=>":id"])}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.id)

                let urlDownloadProposal = '{{ route("ketua-harian.download", ["id" => ":id"])}}';
                urlDownloadProposal = urlDownloadProposal.replace(":id", x.id)


                let urlDownloadSuratBayar = '{{ route("ketua-harian.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
                let suratbayar = x.filename.replace('proposal', 'surat bayar')
                console.log(suratbayar)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', suratbayar)
                

                let urlApprove = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlApprove = urlApprove.replace('data_id', x.id);
                urlApprove = urlApprove.replace('data_data', 1);
    
                let urlReject = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlReject = urlReject.replace('data_id', x.id);
                urlReject = urlReject.replace('data_data', 2);

                tagProposalApproved +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.bidang.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>${x.verifikator.name}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>Rp. ${dollarUS.format(x.kegiatan.budget)}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="button-list">
                            <a type="button" class="btn btn-accent" href="${urlDownloadProposal}">
                                <i class="material-icons icon--left">launch</i>
                                Download Proposal
                            </a>
                            <a type="button" class="btn btn-primary" href="${urlDownloadLembarVerifikasi}">
                                <i class="material-icons icon--left">launch</i>
                                Download Lembar Verifikasi
                            </a>
                            
                        </div>
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
                                <div class="js-lists-values-project h5"><strong>Tidak Ada Data</strong></div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>`
        }
        divProposalApproved.innerHTML = tagProposalApproved

        const divProposalRejected = document.getElementById('proposalRejected');
        let dataProposalRejected = {!! $proposal_rejected !!}
        let tagProposalRejected = ''
        console.log(dataProposalRejected)
        if(dataProposalRejected.length != 0){
            dataProposalRejected.forEach((x) => {
                
                let urlDownloadLembarVerifikasi = '{{ route("ketua-harian.download_lembarVerifikasi", ["id"=>":id"])}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.id)

                let urlDownloadProposal = '{{ route("ketua-harian.download", ["id" => ":id"])}}';
                urlDownloadProposal = urlDownloadProposal.replace(":id", x.id)

                let urlDownloadSuratBayar = '{{ route("ketua-harian.download_suratBayar", ["bidang"=>":id", "kategori"=>":d1", "filename"=>":d2"])}}';
                let suratbayar = x.filename.replace('proposal', 'surat bayar')
                console.log(suratbayar)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.kegiatan.kategori.bidang.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d1', x.kegiatan.kategori.name)
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':d2', suratbayar)

                let urlApprove = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlApprove = urlApprove.replace('data_id', x.id);
                urlApprove = urlApprove.replace('data_data', 1);
    
                let urlReject = '{{ route("ketua-harian.approvedRejected", ["id" => "data_id", "data" => "data_data"]) }}';
                urlReject = urlReject.replace('data_id', x.id);
                urlReject = urlReject.replace('data_data', 2);

                tagProposalRejected +=
                `<tr>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>${x.kegiatan.kategori.bidang.name}</strong></a>
                                </div>
                            </div>
                        </div>
        
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>${x.verifikator.name}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="js-lists-values-project h5"><strong>Rp. ${dollarUS.format(x.kegiatan.budget)}</strong></div>
                        </div>
                    </td>
                    <td>
                        <div class="button-list">
                            <a type="button" class="btn btn-accent" href="${urlDownloadProposal}">
                                <i class="material-icons icon--left">launch</i>
                                Download Proposal
                            </a>
                            <a type="button" class="btn btn-primary" href="${urlDownloadLembarVerifikasi}">
                                <i class="material-icons icon--left">launch</i>
                                Download Lembar Verifikasi
                            </a>
                            
                        </div>
                    </td>  
                </tr>`
            })
        }else{
            tagProposalRejected +=
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
        divProposalRejected.innerHTML = tagProposalRejected
    </script>
    @endsection
