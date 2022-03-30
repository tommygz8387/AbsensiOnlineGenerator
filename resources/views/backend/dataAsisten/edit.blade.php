@extends('partials.master')
@section('content')
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb adminx-page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('indexDataAss') }}">Data Asisten</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Asisten</li>
        </ol>
    </nav>
    <div class="pb-3">
        <h1>Edit Data Asisten</h1>
    </div>


    <div class="card mb-grid">
        <div class="card-header">
            <div class="card-header-title">Form Edit Data Asisten</div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('updateDataAss', ['id' => $edit->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name"
                            value="{{ $edit->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"
                            value="{{ $edit->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                            name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword4" class="col-sm-2 col-form-label form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password"
                            name="password2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDate" class="col-sm-2 col-form-label form-label">Join Date</label>
                    <div class="col-sm-10">
                        <input class="form-control input-date" id="inputDate" type="date" value="{{ $edit->join_date }}"
                            name="join_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label form-label" for="exampleFormControlSelect1">Role</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option value="{{ $edit->role }}" selected>{{ $edit->role }}</option>
                            <option value="Asisten">Asisten</option>
                            <option value="PJ">PJ</option>
                            <option value="Staff">Staff</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label form-label">Upload Foto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" />
                            <label class="custom-file-label">{{ $edit->photo }}</label>
                        </div>

                        <a href="{{ asset('avatar_asisten/' . $edit->photo) }}">{{ $edit->photo }}</a>
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
