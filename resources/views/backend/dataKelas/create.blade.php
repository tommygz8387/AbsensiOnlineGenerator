@extends('partials.master')
@section('content')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('indexDataKel') }}">Data Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Data Kelas</li>
        </ol>
    </nav>
    <div class="pb-3">
        <h1>Create Data Kelas</h1>
    </div>

    @include('common.alert')

    <div class="card mb-grid">
        <div class="card-header">
            <div class="card-header-title">Form Data Kelas</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('storeDataKel') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputNamaKelas" class="col-sm-2 col-form-label form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNamaKelas" placeholder="Nama Kelas" name="nama_kelas">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputJurusan" class="col-sm-2 col-form-label form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputJurusan" placeholder="Jurusan" name="jurusan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFakultas" class="col-sm-2 col-form-label form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputFakultas" placeholder="Fakultas" name="fakultas">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputTingkat" class="col-sm-2 col-form-label form-label">Tingkat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTingkat" placeholder="Tingkat" name="tingkat">
                    </div>
                </div>
                
                {{-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label form-label" for="exampleFormControlSelect1">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option value="Asisten">Asisten</option>
                            <option value="PJ">PJ</option>
                            <option value="Staff">Staff</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
