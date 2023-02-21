@extends('layouts.auth.master')

@section('title')Login
{{ $title }}
@endsection

@push('css')
@endpush

@section('content')
<section>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <form class="login-form" action="{{route('aksilogin')}}" method="post">
                        @if (session('success'))
                        <div class="alert alert-primary outline-2x" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif
                        @if (session('warning'))
                        <div class="alert alert-warning outline-2x " role="alert">
                            {{ session('warning') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger outline-2x " role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                        @csrf
                        <h4>Login</h4>
                        <h6>Welcome To System PMKS Anak Yatim Piatu</h6>
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                                <input class="form-control @error('password') is-invalid @enderror" type="text" name="username" id="username" required="" autocomplete="off" />
                                @error('username')
                                <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required="" autocomplete="off" />
                                @error('password')
                                <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
@endpush

@endsection