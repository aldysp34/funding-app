@extends('layouts.layout')

@section('title', 'User')

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
                    <span class="h4 mb-0 mr-3">List User</span>
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
                            data-sort="js-lists-values-budget">Nama</a>
                    </th>

                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Jabatan</a>
                    </th>
                    <th style="width: 100px;">
                        <a href="javascript:void(0)"
                            class="sort"
                            data-sort="js-lists-values-budget">Bidang</a>
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
                    id="userList">
                
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
                    <span class="h4 mb-0 mr-3">Buat User Baru</span>
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
                <form action="{{route('admin.store_user')}}" method="post">
                    <br>
                    @csrf
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama User" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email User" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatanName" class="form-label">Jabatan</label>
                        <select name="jabatanName" id="jabatanName" data-toggle="select" class="form-control">
                            <option value="1">Ketua Bidang</option>
                            <option value="2">Verifikator</option>
                            <option value="3">Bendahara</option>
                            <option value="4">Ketua Harian</option>
                            <option value="5">Admin</option>
                        </select>
                    </div>
                    <div class="form-group" id="bidang">
                        <label class="form-label"
                                for="bidangName">Bidang</label>
                        <select id="bidangName"
                                name="bidangName"
                                data-toggle="select"
                                class="form-control">
                            @foreach($bidang as $x)
                                <option value="{{ $x->id }}">{{ $x->name }}</option>
                            @endforeach
                        </select>
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
        <li class="sidebar-menu-item active">
            <a href="{{route('admin.user')}}" class="sidebar-menu-button">
                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people_outline</span>
                <span class="sidebar-menu-text">User</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidebar-heading">
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
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
@endsection

@section('new_scripts')
<script>
    const userList = document.getElementById('userList')
    let data = {!! $user !!};
    console.log(data)
    let tagUserList = ''
    if(data.length != 0){
        data.forEach((x) => {
            let jabatan = (y) => {
                    if(y == 1){
                        return 'Ketua Bidang'
                    }else if(y == 2){
                        return 'Verifikator'
                    }else if(y == 3){
                        return 'Bendahara'
                    }else if(y == 4){
                        return 'Ketua Harian'
                    }else{
                        return 'Admin'
                    }
                }
            let urlDestroy = '{{ route("admin.destroy_user", ":id")}}';
            urlDestroy = urlDestroy.replace(':id', x.id);
            if(x.bidang){
                tagUserList += `
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
                                    <div class="js-lists-values-project h5"><strong>${jabatan(x.user_access)}</strong></div>
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
                        <div class="button-list">
                            <form method="POST" action="${urlDestroy}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>`
            }else{
                tagUserList += `
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
                                    <div class="js-lists-values-project h5"><strong>${jabatan(x.user_access)}</strong></div>
                                </div>
                            </div>
                        </div>
    
                    </td>
                    <td>
                        <div class="media flex-nowrap align-items-center"
                                style="white-space: nowrap;">
                            <div class="media-body">
                                <div class="d-flex flex-column">
                                    <div class="js-lists-values-project h5"><strong>-</strong></div>
                                </div>
                            </div>
                        </div>
    
                    </td> 
                </tr>`
            }
        })
    }else{
        tagUserList += `
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
    userList.innerHTML = tagUserList

</script>
@endsection