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
                    <h5>Form Import Data Anak</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">File Anak</label>
                                <div class="col-sm-9">
                                    <input class=" form-control" id="file_anak" type="file" name="file_anak" autocomplete="off">
                                    @error('file_anak')
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

@push('scripts')

@endpush
@endsection