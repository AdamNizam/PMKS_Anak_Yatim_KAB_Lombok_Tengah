@extends('layouts.admin.master')

@section('title')Detail
{{ $title }}
@endsection

@push('css')
@endpush

@section('content')

<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Akun Survior</h4>
                        <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_user_verifikator', $data->id_userlog ) }}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username_ubah" id="username_ubah" value="{{$data->username}}" autocomplete="off">
                                @error('username_ubah')
                                <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-2">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password_ubah" id="password_ubah" autocomplete="off">
                                @error('password_ubah')
                                <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row mb-2">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <form class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Profile</h4>
                        <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">

                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->nama_lengkap}}">

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nomor NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->nik}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->alamat}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <p><input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->email}}"></p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->no_hp}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nomor SK</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$data->nomor_sk}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
@endpush

@endsection