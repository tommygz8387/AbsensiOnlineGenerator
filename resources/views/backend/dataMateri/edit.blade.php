@extends('partials.master')
@section('content')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('indexDataMat') }}">Data Materi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Materi</li>
        </ol>
    </nav>
    <div class="pb-3">
        <h1>Edit Data Materi</h1>
    </div>


    <div class="card mb-grid">
        <div class="card-header">
            <div class="card-header-title">Form Edit Data Materi</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('updateDataMat', ['id' => $edit->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label form-label">materi</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $edit->nama_materi }}" class="form-control" name="nama_materi"
                            placeholder="Nama Kelas">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
