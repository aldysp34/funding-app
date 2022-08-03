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
                        id="proposalApproving">
                    
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
    @endsection

    @section('new_scripts')
    <script>
        const divProposalApproving = document.getElementById('proposalApproving');
        let dataProposalApproving = {!! $proposal_need_approved !!}
        let tagProposalApproving = ''
        console.log(dataProposalApproving)
        if(dataProposalApproving.length != 0){
            dataProposalApproving.forEach((x) => {
                
                let urlDownloadProposal = '{{ route("ketua-harian.download", ":id")}}';
                urlDownloadProposal = urlDownloadProposal.replace(':id', x.subject);

                let urlDownloadLembarVerifikasi = '{{ route("ketua-harian.download_lembarVerifikasi", ":id")}}';
                urlDownloadLembarVerifikasi = urlDownloadLembarVerifikasi.replace(':id', x.subject);

                let urlDownloadSuratBayar = '{{ route("ketua-harian.download_suratBayar", ":id")}}';
                urlDownloadSuratBayar = urlDownloadSuratBayar.replace(':id', x.subject);

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
                                    <a class="js-lists-values-project h5" href="#"><strong>${x.subject}</strong></a>
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
                        <div class="button-list">
                            <a type="button" class="btn btn-accent" href="${urlDownloadProposal}">
                                <i class="material-icons icon--left">launch</i>
                                Download Proposal
                            </a>
                            <a type="button" class="btn btn-primary" href="${urlDownloadLembarVerifikasi}">
                                <i class="material-icons icon--left">launch</i>
                                Download Lembar Verifikasi
                            </a>
                            <a type="button" class="btn btn-success" href="${urlDownloadSuratBayar}">
                                <i class="material-icons icon--left">launch</i>
                                Download Surat Bayar
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
            divProposalApproving.innerHTML = tagProposalApproving
        }
    </script>
    @endsection
