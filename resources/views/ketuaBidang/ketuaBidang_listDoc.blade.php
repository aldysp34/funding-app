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
                    <span class="h4 mb-0 mr-3">List Kegiatan    </span>
                </div>
            </div>
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-nowrap data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Bidang</th>
                    <th>Volume 1</th>
                    <th>Satuan 1</th>
                    <th>Volume 2</th>
                    <th>Satuan 2</th>
                    <th>Volume 3</th>
                    <th>Satuan 3</th>
                    <th width="100px">Action</th>
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
                <a href="{{route('ketua-bidang.home')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                    <span class="sidebar-menu-text">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-heading">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item active">
                <a href="{{route('ketua-bidang.upload_dokumen')}}" class="sidebar-menu-button">
                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">folder</span> 
                    <span class="sidebar-menu-text">Proposal</span>
                </a>
            </li>
        </ul>
    </div>
    @endsection

    @section('new_scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        $(function(){
            let table = $('.data-table').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('ketua-bidang.upload_dokumen')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data:'name', name:'name'},
                    {data:'bidang', name:'bidang->name'},
                    {data:'volume 1', name:'rincianBiaya->volume_1'},
                    {data:'satuan 1', name:'rincianBiaya->satuan_1'},
                    {data:'volume 2', name:'rincianBiaya->volume_2'},
                    {data:'satuan 2', name:'rincianBiaya->satuan_2'},
                    {data:'volume 3', name:'rincianBiaya->volume_3'},
                    {data:'satuan 3', name:'rincianBiaya->satuan_3'},
                    {data:'action', name:'action', orderable:false, searchable:false}
                ]
            })
        })
        const filename = document.getElementById('filename')
        function clickme(){
            let data = $('input[type=file]').val()
            data = data.split("\\");
            document.getElementById('filename').innerHTML = data[2]
        }

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

        const kegiatanName = document.getElementById('name');
        kegiatanName.addEventListener('change', getData);
        function getData(e){
            let kegiatanData = ''
            console.log(kegiatanData);
            console.log(kegiatanName.value);
            kegiatanData.forEach((x) => {
                if(x.name == kegiatanName.value){
                    const budget = document.getElementById('budget').value = x.budget

                    const option_1 = document.getElementById('option_1');
                    option_1.value = x.rincian_biaya.satuan_1 ?? '-'
                    option_1.text = x.rincian_biaya.satuan_1 ?? '-'

                    const option_2 = document.getElementById('option_2');
                    option_2.value = x.rincian_biaya.satuan_2 ?? '-'
                    option_2.text = x.rincian_biaya.satuan_2 ?? '-'

                    const option_3 = document.getElementById('option_3');
                    option_3.value = x.rincian_biaya.satuan_3 ?? '-'
                    option_3.text = x.rincian_biaya.satuan_3 ?? '-'

                    const hargaSatuan = document.getElementById('hargaSatuan').value = x.rincian_biaya.harga_satuan
                }
            })
        }






        
    </script>
    @endsection
