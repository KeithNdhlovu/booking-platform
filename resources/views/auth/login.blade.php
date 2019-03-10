@extends('layouts.appCleanLogin')

@section('content')
<div class="layer">

    <div class="bottom-grid">
        <div class="logo">
            <h1> <a href="{{ url('/') }}"><span class="fa fa-flight"></span></a></h1>
        </div>
        <div class="links">
            <ul class="links-unordered-list">
                <li class="active">
                    <a href="#" class="">Login</a>
                </li>
                <li class="">
                    <a href="{{ url('register') }}" class="">Register</a>
                </li>
                <li class="">
                    <a href="{{ url('booking') }}" class="">Check Availability</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content-w3ls">
        <div class="text-center icon">
            <span class="fa">
                <img class="logo-container" src="{{ asset('images/logo.png') }}" />
            </span>
        </div>
        <div class="content-bottom">
            {!! Form::open(['route' => 'login', 'novalidate'=>'novalidate', 'id'=>'sign_in', 'role' => 'form', 'method' => 'POST'] ) !!}
                {{ csrf_field() }}
                
                @if ($errors->any())
                    <div class="form-group text-center ">
                        @foreach ($errors->all() as $error)
                            <span class="help-block">
                                <label class="error">{{ $error }}</label>
                            </span>
                        @endforeach
                        <br><br>
                    </div>
                @endif

                <div class="field-group">
                    <span class="fa fa-user" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="field-group">
                    <span class="fa fa-lock" aria-hidden="true"></span>
                    <div class="wthree-field">
                        <input type="password" class="form-control" name="password" placeholder="*********" required>
                    </div>
                </div>
                <div class="wthree-field">
                    <button type="submit" class="btn">Login</button>
                </div>
                <ul class="list-login">
                    <li class="switch-agileits">
                        <label class="switch">
                            <input type="checkbox" name="remember" id="remember">
                            <span class="slider round"></span>
                            keep Logged in
                        </label>
                    </li>
                    <li class="clearfix"></li>
                </ul>
            </form>
        </div>
    </div>
</div>
@endsection
