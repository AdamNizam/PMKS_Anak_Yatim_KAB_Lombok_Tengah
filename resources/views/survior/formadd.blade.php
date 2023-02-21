<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities. laravel/framework: ^8.40">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    @includeIf('layouts.survior.partials.css')
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
        <!-- Page Header Start-->

        <!-- Page Header Ends -->
        <!-- Page Body Start-->

        <!-- Page Sidebar Start-->

        <!-- Page Sidebar Ends-->
        <div class="page-body-wrapper">
            <!-- Container-fluid starts-->

            <div class="caontainer-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-8 mt-5">

                        <div class="card">
                            @section('content')
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
                                <h5>Lengkapi Data Anda!</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="{{route('survior.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 row">
                                            <input type="hidden" id="id_userlog" name="id_userlog" value="{{Session::get('id_userlog')}}">
                                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="username" type="text" name="username" autocomplete="off" value="{{Session::get('username')}}">
                                                @error('username')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input class="password form-control" id="password" type="password" name="password" placeholder="" autocomplete="off">
                                                @error('password')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input class="nama form-control" id="nama" type="text" name="nama" placeholder="" autocomplete="off">
                                                @error('nama')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9">
                                                <input class=" form-control" id="nik" type="number" name="nik" autocomplete="off">
                                                @error('nik')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input class="email form-control" id="email" type="email" name="email" autocomplete="off">
                                                @error('email')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">No Handphone</label>
                                            <div class="col-sm-9">
                                                <input class="no_hp form-control" id="no_hp" type="number" name="no_hp" required autocomplete="off">
                                                @error('no_hp')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">Alamat </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="alamat" type="text" name="alamat" autocomplete="off">
                                                @error('alamat')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <select name="kecamatan" id="kecamatan" class="form-control">
                                                    <option value="">--Pilih Kecamatan--</option>
                                                    @forelse ($kecamatan as $kec)

                                                    <option value="{{$kec->id_kecamatan}}">{{$kec->nama_kecamatan}}</option>

                                                    @empty
                                                    @endforelse
                                                    @error('kecamatan')
                                                    <p class="help-block">{{ $message }}</p>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">Desa</label>
                                            <div class="col-sm-9">
                                                <select name="desa" id="desa" class="form-control">
                                                    @error('desa')
                                                    <p class="help-block">{{ $message }}</p>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">No SK Bupati</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="no_sk" type="text" name="no_sk" autocomplete="off">
                                                @error('no_sk')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="" class="col-sm-3 col-form-label">File SK Bupati</label>
                                            <div class="col-sm-9">
                                                <input class="file_sk form-control" id="file_sk" type="file" name="file_sk" autocomplete="off" accept="pdf">
                                                @error('file_sk')
                                                <p class="help-block">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright {{date('Y')}} © Tim Dev Diskominfo Loteng All rights reserved.</p>
                    </div>

                </div>
            </div>
        </footer>

    </div>
    <!-- latest jquery-->
    @includeIf('layouts.survior.partials.js')
    <script>
        $(document).ready(function() {

            $("#kecamatan").change(function() {
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
    </script>
</body>

</html>