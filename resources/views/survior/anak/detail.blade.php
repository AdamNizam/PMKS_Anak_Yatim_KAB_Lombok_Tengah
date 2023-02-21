@extends('layouts.survior.master')

@section('title')Detail
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush

@section('content')

<h3>Detail Anak</h3>

<div class="container-fluid">
    <div class="edit-profile">

        <div class="row">
            <div class="col-xl-4">
                <div class="card" style="max-height: 300px; overflow:hidden">
                    @if($anak->foto_anak != '-')
                    <img src="{{asset('storage/'.$anak->foto_anak)}}" class="card-img-top" alt="..." style="height: 400px;">
                    @else
                    <img src="{{asset('assets/images/default.png')}}" class="card-img-top" alt="..." style="height: 400px;">
                    @endif
                </div>
                <form action="{{route('upload_gambar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$anak->id_anak}}">
                    <input type="file" name="foto" id="foto" class="form-control mb-2 @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')
                    <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-primary">Upload Foto</button>
                </form>

            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-man-in-glasses"></i>Profile</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#formal" role="tab" aria-controls="info-profile" aria-selected="false"> <i class="icofont icofont-ui-home"></i>Prestasi Formal</a></li>
                            <li class="nav-item"><a class="nav-link" id="contact-info-tab" data-bs-toggle="tab" href="#nonformal" role="tab" aria-controls="info-contact" aria-selected="false"><i class="icofont icofont-contacts"></i>Prestasi Non Formal</a></li>
                        </ul>
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
                        <div class="tab-content" id="info-tabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="info-home-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap </label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->nama_anak}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap </label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->nama_anak}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nomor KK</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->nomor_kk}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nomor NIK</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->nomor_nik}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->alamat}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-9">
                                                <p><input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->tempat_lahir}}"></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->tgl_lahir}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Usia</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->usia}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Wali</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->nama_wali}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->pendidikan}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Kelas Pendidikan</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->kelas_pendidikan}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Alamat Sekolah</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$anak->alamat_sekolah}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Status Anak</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value='@if($anak->status_anak == 1)Yatim
                                                @elseif($anak->status_anak == 2)Piatu
                                                @elseif($anak->status_anak == 3)Yatim Piatu
                                                @endif'>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Status Verifikaksi</label>
                                            <div class="col-sm-9">
                                                @if($anak->status_verifikasi == 0)
                                                <div class="span badge rounded-pill pill-badge-danger">Belum Verifikasi</div>
                                                @else
                                                <div class="span badge rounded-pill pill-badge-primary"> Sudah Verifikasi</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="formal" role="tabpanel" aria-labelledby="profile-info-tab">
                                <button class="btn btn-primary mb-2 btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add New</button>

                                <div class="dt-ext table-responsive">
                                    <table class="display nowrap " id="basic-1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Prestasi</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            @forelse ($formal as $formal)
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>{{$formal->prestasi_formal}}</td>
                                                <td>{{$formal->tahun}}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning btn-square tombol-ubah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modalubah" data-id="{{$formal->id_prestasi_formal}}"><i class="fa fa-edit"></i></button>
                                                    <form onsubmit="return confirm('Are You Sure ?');" action="/prestasi/formal/{{$formal->id_prestasi_formal}}" method="POST" class="d-inline ">
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
                            <div class="tab-pane fade" id="nonformal" role="tabpanel" aria-labelledby="contact-info-tab">
                                <button class="btn btn-primary mb-2 btn-sm" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#tambahnonformal">Add New</button>
                                <div class="dt-ext table-responsive">
                                    <table class="display nowrap " id="basic-2">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Prestasi</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            @forelse ($nonformal as $nonformal)
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>{{$nonformal->prestasi_non_formal}}</td>
                                                <td>{{$nonformal->tahun}}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning btn-square tombol-ubahnonformal" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#modalubahnonformal" data-id="{{$nonformal->id_prestasi_non_formal}}"><i class="fa fa-edit"></i></button>
                                                    <form onsubmit="return confirm('Are You Sure ?');" action="/prestasi/non_formal/{{$nonformal->id_prestasi_non_formal}}" method="POST" class="d-inline ">
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
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('formal.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Prestasi Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id_anak" id="id_anak" value="{{$anak->id_anak}}">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        @error('nama')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square @error('tahun') is-invalid @enderror" id="tahun" name="tahun" type="text" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        @error('tahun')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog form-ubah" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Prestasi Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_anak_ubah" id="id_anak_ubah" value="{{$anak->id_anak}}">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square @error('nama_ubah') is-invalid @enderror" id="nama_ubah" name="nama_ubah" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        @error('nama_ubah')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square @error('tahun_ubah') is-invalid @enderror" id="tahun_ubah" name="tahun_ubah" type="number" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        @error('tahun_ubah')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahnonformal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('non_formal.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Prestasi Non Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id_anak_non_formal" id="id_anak_non_formal" value="{{$anak->id_anak}}">
                        <label for="input-text-1">Prestasi Non Formal</label>
                        <input class="form-control btn-square @error('nama_non_formal') is-invalid @enderror" id="nama_non_formal" name="nama_non_formal" type="text" placeholder="Prestasi Non Formal " autocomplete="off">
                        @error('nama_non_formal')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square @error('tahun_non_formal') is-invalid @enderror" id="tahun_non_formal" name="tahun_non_formal" type="text" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        @error('tahun_non_formal')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalubahnonformal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog form-ubah" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Prestasi Non Formal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_anak_ubah_non_formal" id="id_anak_ubah_non_formal" value="{{$anak->id_anak}}">
                        <label for="input-text-1">Prestasi Formal</label>
                        <input class="form-control btn-square @error('nama_ubah') is-invalid @enderror" id="nama_ubah_non_formal" name="nama_ubah_non_formal" type="text" placeholder="Prestasi Formal " autocomplete="off">
                        @error('nama_ubah_non_formal')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Tahun</label>
                        <input class="form-control btn-square @error('tahun_ubah_non_formal') is-invalid @enderror" id="tahun_ubah_non_formal" name="tahun_ubah_non_formal" type="number" placeholder="Tahun Mendapat Prestasi" autocomplete="off">
                        @error('tahun_ubah_non_formal')
                        <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>
    $(function() {

        $('.tombol-ubah').on('click', function() {
            const id = $(this).data('id')
            $('.form-ubah form').attr('action', '/prestasi/formal/' + id)
            // console.log(id);

            $.ajax({
                url: `/prestasi/formal/` + id + `/edit`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    $('#id_ubah').val(data.id_prestasi_formal)
                    $('#nama_ubah').val(data.prestasi_formal)
                    $('#tahun_ubah').val(data.tahun)

                }
            })
        })
        $('.tombol-ubahnonformal').on('click', function() {
            const id = $(this).data('id')
            $('.form-ubah form').attr('action', '/prestasi/non_formal/' + id)
            // console.log(id);

            $.ajax({
                url: `/prestasi/non_formal/` + id + `/edit`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id_ubah_non_formal').val(data.id_prestasi_non_formal)
                    $('#nama_ubah_non_formal').val(data.prestasi_non_formal)
                    $('#tahun_ubah_non_formal').val(data.tahun)

                }
            })
        })
    })
</script>
@endpush

@endsection