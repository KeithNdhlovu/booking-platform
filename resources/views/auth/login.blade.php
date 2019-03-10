@extends('layouts.appClean')

@section('content')
<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
    <div class="row w-100">
        <div class="col-sm-6 col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <div class="logo-wrapper">
                    <img class="logo-container" src="{{ asset('images/logo.png') }}" />
                    <br/><br/>
                </div>
                {!! Form::open(['route' => 'login', 'novalidate'=>'novalidate', 'id'=>'sign_in', 'role' => 'form', 'method' => 'POST'] ) !!}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="form-group">
                            @foreach ($errors->all() as $error)
                                <span class="help-block">
                                    <label class="error">{{ $error }}</label>
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="label">Username</label>
                        <div class="input-group">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="*********" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                            <i class="mdi mdi-check-circle-outline"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        
                    </div>
                    <div class="text-block text-center my-3">
                        <span class="text-small font-weight-semibold">Not a member ?</span>
                        <a href="{{ url('/register') }}" class="text-black text-small">Create new account</a>
                    </div>
                {!! Form::close() !!}
            </div>
            <ul class="auth-footer"></ul>
            <p class="footer-text text-center">© 2018 blasczykowski.io</p>
        </div>
    </div>
</div>
@endsection
