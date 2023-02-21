@extends('layouts.verifikator.master')

@section('title')Anak {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
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
        </div>
    </div>
</div>
<div class="caontainer-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="staticEmail2" class="visually-hidden">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">--Pilih Kecamatan--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword2" class="visually-hidden">Desa</label>
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">--Pilih Desa--</option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display nowrap" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor KK</th>
                                    <th>Nomor NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                    <th>Nama Wali</th>
                                    <th>ALamat Sekolah</th>
                                    <th>Status Anak</th>

                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($anak as $anak)
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>{{$anak->nama_anak}}</td>
                                    <td>{{$anak->nomor_kk}}</td>
                                    <td>{{$anak->nomor_nik}}</td>
                                    <td>{{$anak->alamat}}</td>
                                    <td>@if($anak->jenis_kelamin == 1)
                                        Laki Laki
                                        @else
                                        Perempuan
                                        @endif</td>
                                    <td>{{$anak->tempat_lahir}}</td>
                                    <td>{{$anak->tgl_lahir}}</td>
                                    <td>{{$anak->usia}}</td>
                                    <td>{{$anak->nama_wali}}</td>
                                    <td>{{$anak->alamat_sekolah}}</td>
                                    <td>
                                        @if($anak->status_anak == 1)
                                        Yatim
                                        @elseif($anak->status_anak == 2)
                                        Piatu
                                        @elseif($anak->status_anak == 3)
                                        Yatim Piatu
                                        @endif

                                    </td>

                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>


@endpush
@endsection