@extends('layouts.admin.master')

@section('title')Dusun {{ $title }}
@endsection

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">

<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
@endpush
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Dusun</h4>
                    </div>
                    <div class="col-md-6 p-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"><i data-feather="plus-square"> </i>Tambah Baru</button>
                        <!-- <a class="btn btn-primary" href="{{ route('role.create') }}"> </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Simple</button> -->

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
<div class="caontainer-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Desa</th>
                                    <th>Nama Dusun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($dusun as $dusun)
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>{{$dusun->nama_kecamatan}}</td>
                                    <td>{{$dusun->nama_desa}}</td>
                                    <td>{{$dusun->dusun}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning btn-square tombol-ubah" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#tomboUbah" data-id="{{$dusun->id_dusun}}"><i class="fa fa-edit"></i></button>
                                        <form onsubmit="return confirm('Are You Sure ?');" action="/alamat/dusun/{{$dusun->id_dusun}}" method="POST" class="d-inline ">
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
<!-- mmodal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dusun.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Dusun</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Nama Kecamatan</label>
                        <select name="kec" id="kec" class="form-control btn-square @error('kec') is-invalid @enderror">
                            <option value="">--Pilih Kecamatan--</option>
                            @forelse ($kecamatan as $kec)

                            <option value="{{$kec->id_kecamatan}}">{{$kec->nama_kecamatan}}</option>

                            @empty
                            @endforelse
                        </select>
                        @error('kec')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">

                        <label for="input-text-1">Nama Desa</label>
                        <select name="desa" id="desa" class="form-control btn-square @error('desa') is-invalid @enderror">

                        </select>
                        @error('desa')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id" id="id">
                        <label for="input-text-1">Nama Dusun</label>
                        <input type="text" name="dusun" id="dusun" class="form-control @error('dusun') is-invalid @enderror" autocomplete="off">
                        @error('dusun')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tomboUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-ubah">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Dusun</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Nama Kecamatan</label>
                        <select name="kecamatan_ubah" id="kecamatan_ubah" class="form-control btn-square @error('kecamatan_ubah') is-invalid @enderror">
                            <option value="">--Pilih Kecamatan--</option>
                            @forelse ($kecamatan as $kec)

                            <option value="{{$kec->id_kecamatan}}">{{$kec->nama_kecamatan}}</option>

                            @empty
                            @endforelse
                        </select>
                        @error('kecamatan')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <label for="input-text-1">Nama Desa</label>
                        <select name="desa_ubah" id="desa_ubah" class="form-control btn-square @error('desa_ubah') is-invalid @enderror">
                            @forelse ($desa as $desa)
                            <option value="{{$desa->id_desa}}">{{$desa->nama_desa}}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('desa_ubah')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 draggable">
                        <input type="hidden" name="id_ubah" id="id_ubah">
                        <label for="input-text-1">Nama Dusun</label>
                        <input type="text" name="dusun_ubah" id="dusun_ubah" class="form-control @error('dusun_ubah') is-invalid @enderror" autocomplete="off">
                        @error('dusun_ubah')
                        <p class="help-block">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')

<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/sweet-alert/app.js')}}"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
    // $(document).ready(function() {
    //     $('.kec').select2();
    // });

    $(document).ready(function() {

        $("#kec").change(function() {
            var id = $(this).val();
            // console.log(id_kec);
            $.ajax({
                url: '/alamat/getdesa',
                type: 'GET',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    var len = response.length;
                    $("#desa").empty();
                    $("#desa").append("<option value=''>-- Pilih Desa --</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id_desa'];
                        var name = response[i]['nama_desa'];

                        $("#desa").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
            });
        })
    })
    $(function() {

        $('.tombol-ubah').on('click', function() {
            const id = $(this).data('id')
            // let id_default
            $('.form-ubah form').attr('action', '/alamat/dusun/' + id)
            // console.log(id);
            $.ajax({
                url: `/alamat/dusun/` + id + `/edit`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $('#id_ubah').val(data.id_desa)
                    $('#desa_ubah').val(data.id_desa)
                    $('#kecamatan_ubah').val(data.id_kecamatan)
                    $('#dusun_ubah').val(data.dusun)
                    // id_default = data.id_kecamatan
                }
            })
            // console.log(id_default)
            $("#kecamatan_ubah").change(function() {
                var id = $(this).val();
                // console.log(id_kec);
                $.ajax({
                    url: '/alamat/getdesa',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)
                        var len = response.length;
                        $("#desa_ubah").empty();
                        $("#desa_ubah").append("<option value=''>-- Pilih Desa --</option>");
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_desa'];
                            var name = response[i]['nama_desa'];

                            $("#desa_ubah").append("<option value='" + id + "'>" + name + "</option>");
                        }
                    }
                });
            })
        })
    })
</script>
@endpush
@endsection