@extends('layouts.survior.master')

@section('title')Anak {{ $title }}
@endsection

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endpush
@section('content')

<div class="caontainer-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12 col-xl-12 xl-50 col-md-12 box-col-12">
            <div class="card height-equal">
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
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Kontak</h5>
                    <div class="setting-list">
                        <ul class="list-unstyled setting-option">
                            <li>
                                <div class="setting-primary"><i class="icon-settings"></i></div>
                            </li>
                            <li><i class="view-html fa fa-code font-primary"></i></li>
                            <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                            <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                            <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                            <li><i class="icofont icofont-error close-card font-primary"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="contact-form card-body">
                    <form class="theme-form">
                        <div class="form-icon"><i class="icofont icofont-envelope-open"></i></div>
                        <div class="mb-3">
                            <label for="exampleInputName">Your Name</label>
                            <input class="form-control" id="exampleInputName" type="text" placeholder="John Dio">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="exampleInputEmail1">Email</label>
                            <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Demo@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="exampleInputEmail1">Message</label>
                            <textarea class="form-control textarea" rows="3" cols="50" placeholder="Your Message"></textarea>
                        </div>
                        <div class="text-sm-end">
                            <button class="btn btn-primary">Kirim</button>
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