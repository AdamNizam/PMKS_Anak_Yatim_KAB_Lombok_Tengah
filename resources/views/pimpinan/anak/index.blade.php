@extends('layouts.pimpinan.master')

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
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control">

                                </select>
                            </div>
                            <div class=" col-md-6">
                                <label for="">Desa</label>
                                <select name="desa" id="desa" class="form-control">

                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                    <th>Nomor KK</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Usia</th>
                                </tr>
                            </thead>
                            <tbody id="anak_all">

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

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/all',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const anak = data['anak']
                $('#anak_all').empty()
                var no = 1;
                for (let a = 0; a < anak.length; a++) {
                    $('#anak_all').append(`<tr>
                            <td>` + (no++) + `</td>
                            <td>` + anak[a].nama_anak + `</td>
                            <td>` + anak[a].nomor_kk + `</td>
                            <td>` + anak[a].nomor_nik + `</td>
                            <td>` + anak[a].alamat + `</td>
                            <td>` + anak[a].usia + `</td>
                        </tr>`)
                }
                $('#kecamatan').append(`<option value="">--Pilih Kecamatan--</option>`)
                for (let k = 0; k < data.kecamatan.length; k++) {
                    $('#kecamatan').append(`<option value="` + data.kecamatan[k].id_kecamatan + `">` + data.kecamatan[k].nama_kecamatan + `</option>`)
                }
                $("#kecamatan").change(function() {
                    var id_kec = $(this).val();
                    const desa = data['desa']
                    const anak_kecamatan = anak.filter((kecamatan) => kecamatan.id_kecamatan == id_kec);
                    const desa_kecamatan = desa.filter((desa) => desa.id_kecamatan == id_kec);
                    $('#anak_all').empty()
                    var nom = 1
                    for (let k = 0; k < anak_kecamatan.length; k++) {
                        $('#anak_all').append(`<tr>
                            <td>` + (nom++) + `</td>
                            <td>` + anak_kecamatan[k].nama_anak + `</td>
                            <td>` + anak_kecamatan[k].nomor_kk + `</td>
                            <td>` + anak_kecamatan[k].nomor_nik + `</td>
                            <td>` + anak_kecamatan[k].alamat + `</td>
                            <td>` + anak_kecamatan[k].usia + `</td>
                        </tr>`)

                    }
                    $('#desa').empty()
                    $('#desa').append(`<option value="">--Pilih Desa--</option>`)
                    for (let d = 0; d < desa_kecamatan.length; d++) {
                        $('#desa').append(
                            `<option value="` + desa_kecamatan[d].id_desa + `">` + desa_kecamatan[d].nama_desa + `</option>`
                        )
                    }
                })
                $("#desa").change(function() {
                    var id_desa = $(this).val();
                    const anak_desa = anak.filter((desa) => desa.id_desa == id_desa);
                    $('#anak_all').empty()
                    var nomo = 1;
                    for (let ad = 0; ad < anak_desa.length; ad++) {
                        $('#anak_all').append(`<tr>
                            <td>` + (nomo++) + `</td>
                            <td>` + anak_desa[ad].nama_anak + `</td>
                            <td>` + anak_desa[ad].nomor_kk + `</td>
                            <td>` + anak_desa[ad].nomor_nik + `</td>
                            <td>` + anak_desa[ad].alamat + `</td>
                            <td>` + anak_desa[ad].usia + `</td>
                        </tr>`)

                    }
                })
            }
        })
    })
</script>
@endpush
@endsection