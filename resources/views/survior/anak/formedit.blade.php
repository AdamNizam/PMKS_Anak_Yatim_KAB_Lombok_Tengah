@extends('layouts.survior.master')

@section('title')Anak {{ $title }}
@endsection

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush
@section('content')

<div class="caontainer-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">

                @if (session('success'))
                <div class="alert alert-primary outline-2x" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger outline-2x " role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-header">
                    <h5>Form Tambah Anak</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{ route('anak.update', $anak->id_anak) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 row">

                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text" name="nama" autocomplete="off" value="{{ old('nama', $anak->nama_anak) }}">
                                    @error('nama')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nomor KK</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="kk" type="number" name="kk" placeholder="" autocomplete="off" value="{{ old('kk', $anak->nomor_kk) }}">
                                    @error('kk')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nomor NIK</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="nik" type="number" name="nik" placeholder="" autocomplete="off" value="{{ old('nik', $anak->nomor_nik) }}">
                                    @error('nik')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="alamat" type="text" name="alamat" placeholder="" autocomplete="off" value="{{ old('alamat', $anak->alamat) }}">
                                    @error('alamat')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="1" @if($anak->jenis_kelamin=='1') selected='selected' @endif>Laki Laki</option>
                                        <option value="0" @if($anak->jenis_kelamin=='0') selected='selected' @endif>Perempuan</option>
                                    </select>
                                    @error('jk')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="tempat_lahir" type="text" name="tempat_lahir" required autocomplete="off" value="{{ old('tempat_lahir', $anak->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Tanggal Lahir </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" autocomplete="off" value="{{$anak->tgl_lahir}}">
                                    @error('tgl_lahir')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Nama Wali </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="nama_wali" type="text" name="nama_wali" autocomplete="off" value="{{ old('nama_wali', $anak->nama_wali) }}">
                                    @error('nama_wali')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Alamat Sekolah </label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="alamat_sekolah" type="text" name="alamat_sekolah" autocomplete="off" value="{{ old('alamat_sekolah', $anak->alamat_sekolah) }}">
                                    @error('alamat_sekolah')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Status Anak</label>
                                <div class="col-sm-9">
                                    <select name="status_anak" id="status_anak" class="form-control">
                                        <option value="">--Pilih Status Anak--</option>
                                        <option value="1" @if($anak->status_anak=='1') selected='selected' @endif>Yatim</option>
                                        <option value="2" @if($anak->status_anak=='2') selected='selected' @endif>Piatu</option>
                                        <option value="3" @if($anak->status_anak=='3') selected='selected' @endif>Yatim Piatu</option>
                                    </select>
                                    @error('jk')
                                    <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Pekerjaa Wali</label>
                                <div class="col-sm-9">
                                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                                        <option value="">--Pilih pekerjaan--</option>
                                        @forelse ($pekerjaan as $kerja)

                                        <option value="{{$kerja->id_pekerjaan}}" @if($anak->id_pekerjaan_wali==$kerja->id_pekerjaan) selected='selected' @endif>{{$kerja->pekerjaan}}</option>

                                        @empty
                                        @endforelse
                                        @error('pekerjaan')
                                        <p class="help-block">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Pendidikan</label>
                                <div class="col-sm-9">
                                    <select name="pendidikan" id="pendidikan" class="form-control">
                                        <option>--Pilih Pendidikan--</option>
                                        @forelse ($pendidikan as $pendidik)

                                        <option value="{{$pendidik->id_pendidikan}}" @if($anak->id_pendidikan==$pendidik->id_pendidikan) selected='selected' @endif>{{$pendidik->pendidikan}}</option>

                                        @empty
                                        @endforelse
                                        @error('pendidikan')
                                        <p class="help-block">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Kelas Pendidikan</label>
                                <div class="col-sm-9">
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="">--Pilih Kelas Pendidikan--</option>
                                        @forelse ($kelas_pendidikan as $kelas)

                                        <option value="{{$kelas->id_kelas_pendidikan}}" @if($anak->id_kelas_pendidikan==$kelas->id_kelas_pendidikan) selected='selected' @endif>{{$kelas->kelas_pendidikan}}</option>

                                        @empty
                                        @endforelse
                                        @error('kelas')
                                        <p class="help-block">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Simpan Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

@endpush
@endsection