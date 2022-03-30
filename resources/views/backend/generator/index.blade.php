@extends('partials.master')
@section('content')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Kode</li>
        </ol>
    </nav>
    <div class="pb-3">
        <h1>List Kode</h1>
    </div>

    @include('common.alert')

    <div class="row">
        <div class="col">
            <div class="card mb-grid">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title"><a class="btn btn-sm btn-success" href="{{ route('generateKode',["frommodule"=>"frommodule"]) }}">Generate Code +</a></div>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0">
                        <thead> 
                            
                            <tr>
                                <th scope="col">
                                    <label class="custom-control custom-checkbox m-0 p-0">
                                        <input type="checkbox" class="custom-control-input table-select-all">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </th>
                                <th scope="col">Kode</th>
                                <th scope="col">Pembuat Kode</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kodes as $k)
                            <tr>
                                <th scope="row">
                                    <label class="custom-control custom-checkbox m-0 p-0">
                                        <input type="checkbox" class="custom-control-input table-select-row">
                                        <span class="custom-control-indicator"></span>
                                    </label>
                                </th>
                                <td>{{ $k->kode }}</td>
                                <td>{{ $k->name }}</td>
                                <td>
                                    @if ($k->user_id_get!=null)
                                        Sudah Dipakai
                                    @else
                                        Belum Dipakai
                                    @endif
                                </td>
                                {{-- <td>
                                    <a href="{{ route('editDataKel',["id" => $kelas->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('destroyDataKel',["id" => $kelas->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
