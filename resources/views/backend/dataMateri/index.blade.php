@extends('partials.master')
@section('content')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Materi</li>
        </ol>
    </nav>
    <div class="pb-3">
        <h1>Data Materi</h1>
    </div>

    @include('common.alert')

    <div class="row">
        <div class="col">
            <div class="card mb-grid">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title"><a class="btn btn-sm btn-success" href="{{ route('createDataMat') }}">Add
                            Data +</a></div>
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
                                <th scope="col">Materi</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materis as $mat)
                                <tr>
                                    <th scope="row">
                                        <label class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input table-select-row">
                                            <span class="custom-control-indicator"></span>
                                        </label>
                                    </th>
                                    <td>{{ $mat->nama_materi }}</td>
                                    <td>
                                        <a href="{{ route('editDataMat', ['id' => $mat->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('destroyDataMat', ['id' => $mat->id]) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
