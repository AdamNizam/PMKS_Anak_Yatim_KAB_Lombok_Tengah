@extends('layouts.admin.master')

@section('title')Anak {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush
@section('content')



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
                                    <th>Nomor KK</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody id="data_anak">

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
                const all_anak = data['anak']
                // console.log(all_anak)
                $('#data_anak').empty()
                let no = 1
                for (let i = 0; i < all_anak.length; i++) {
                    if (all_anak[i].jenis_kelamin == 1) {
                        var jenis_kel = 'Laki Laki'
                    } else {
                        var jenis_kel = 'Perempuan'
                    }
                    $('#data_anak').append(`
                        <tr>
                            <td>` + (no++) + `</td>
                            <td>` + all_anak[i].nama_anak + `</td>
                            <td>` + all_anak[i].nomor_kk + `</td>
                            <td>` + all_anak[i].nomor_nik + `</td>
                            <td>` + all_anak[i].alamat + `</td>
                            <td>` + jenis_kel + `</td>
                        </tr>
                        `)
                }
            }
        })
    })
</script>
@endpush
@endsection