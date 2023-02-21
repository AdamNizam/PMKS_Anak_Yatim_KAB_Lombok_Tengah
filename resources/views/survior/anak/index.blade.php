@extends('layouts.survior.master')

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
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display nowrap" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($anak as $anak)
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>{{$anak->nama_anak}}</td>
                                    <td>{{$anak->nomor_nik}}</td>
                                    <td>{{$anak->alamat}}</td>
                                    <td>@if($anak->jenis_kelamin == 1)
                                        Laki Laki
                                        @else
                                        Perempuan
                                        @endif</td>
                                    <td>{{$anak->tgl_lahir}}</td>
                                    <td>
                                        @if($anak->status_verifikasi == 0)
                                        <div class="span badge rounded-pill pill-badge-danger">Belum Verifikasi</div>
                                        @else
                                        <div class="span badge rounded-pill pill-badge-primary"> Sudah Verifikasi</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('detail', $anak->id_anak)}}" class="btn btn-sm btn-info btn-square " data-id=""><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('anak.edit', $anak->id_anak) }}" class="btn btn-sm btn-warning btn-square" data-id=""><i class="fa fa-edit"></i></a>
                                        <form onsubmit="return confirm('Are You Sure ?');" action="/anak/anak/{{$anak->id_anak}}" method="POST" class="d-inline ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-square "><i class="fa fa-trash"></i></button>
                                        </form>
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