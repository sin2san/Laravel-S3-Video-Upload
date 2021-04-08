@extends('site.layouts.default')

@section('htmlheader_title')
    Register
@endsection

@section('main-content')
<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Register</h2>
                <ul>
                    <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-user"></i>Register</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="login" class="login section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h1><span>Register</span> New Account</h1>
                    <p>Create an Account</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12">
                <div class="login-main">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="form-main">
                                @if(session('success'))<div class="alert alert-success">{!! session('success') !!}</div>@endif
                                @if(session('error'))<div class="alert alert-danger">{!! session('error') !!}</div>@endif
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <i class="fa fa-exclamation-circle"></i> <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @if($errors->first('first_name'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('first_name') !!}</a>
                                            </li>
                                            @endif
                                            @if($errors->first('last_name'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('last_name') !!}</a>
                                            </li>
                                            @endif
                                            @if($errors->first('email'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('email') !!}</a>
                                            </li>
                                            @endif
                                            @if($errors->first('password'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('password') !!}</a>
                                            </li>
                                            @endif
                                            @if($errors->first('confirm_password'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('confirm_password') !!}</a>
                                            </li>
                                            @endif
                                            @if($errors->first('age'))
                                            <li>
                                                <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('age') !!}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                {!! Form::model(null, ['autocomplete' => 'off', 'class' => 'form']) !!}
                                {!! csrf_field() !!}
                                @php
                                    $gender = [
                                        'male' => 'Male',
                                        'female' => 'Female'
                                    ];
                                @endphp
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::number('age', null, ['class' => 'form-control', 'placeholder' => 'Age', 'min' => "1"])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::select('gender', $gender, null,  ['class' => 'form-control', 'placeholder' => 'Select Gender'])!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            {!!Form::text('ethnicity', null, ['class' => 'form-control', 'placeholder' => 'Ethnicity'])!!}
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn primary">Sign Up</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group button">
                                            <a href="{{ url('login') }}" class="btn">Already have an account</a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
