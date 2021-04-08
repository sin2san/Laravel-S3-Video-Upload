@extends('site.layouts.default')

@section('htmlheader_title')
    Add Video
@endsection

@section('main-content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Add Video</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-rss-square"></i>Feed</a></li>
                        <li class="active"><a href="#">Add Video</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="login section">
        <div class="container">
            <div class="row justify-content-center">
                {!! Form::model(null, ['autocomplete' => 'off', 'files' => 'true']) !!}
                {!! csrf_field() !!}
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">{!! session('success') !!}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @if ($errors->first('title'))
                                    <li>
                                        <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('title') !!}</a>
                                    </li>
                                @endif
                                @if ($errors->first('video'))
                                    <li>
                                        <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('video') !!}</a>
                                    </li>
                                @endif
                                @if ($errors->first('thumbnail'))
                                    <li>
                                        <a class="error-msg"><i class="fa fa-times-circle"></i> {!! $errors->first('thumbnail') !!}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    <style>
                        label {
                            font-weight: 600;
                        }
                    </style>
                    @if (count($errors) == 0)
                        <div class="alert alert-danger" style="display: none" id="errorMsg">
                            <ul>
                                <li id="sizeMsg" style="display: none">
                                    <a class="error-msg"><i class="fa fa-times-circle"></i> Uploaded video size is greater then 5MB</a>
                                </li>
                                <li id="sizeMsg2" style="display: none">
                                    <a class="error-msg"><i class="fa fa-times-circle"></i> Uploaded thumbnail size is greater then 2MB</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <h5 class="h5-spacing">Instruction</h5>
                    <p>In this page you can capture your own videos or some friend’s conversation. The file
                        format should be a <strong>mp4 video file</strong> and not more then <strong>5MB</strong></p>
                    <p class="mb-4">The thumbnail image should be <strong>1280 * 720 pixels</strong>, not more then <strong>2MB</strong> and the file format should be <strong>jpg</strong>.</p>
                    <div class="form-group">
                        {!! Form::label('Title *') !!}
                        {!! Form::text('title', null, ['class' => 'form-control mb-2', 'placeholder' => 'Enter title', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control mb-4', 'placeholder' => 'Enter description']) !!}
                    </div>
                    <div>
                        {!! Form::label('Upload Video (.mp4)') !!}
                        {!! Form::file('video', ['accept' => 'video/mp4', 'id' => 'file', 'class' => 'mb-4', 'required']) !!}
                    </div>
                    <div>
                        {!! Form::label('Upload Thumbnail (.jpg)') !!}
                        {!! Form::file('thumbnail', ['accept' => 'image/jpeg', 'id' => 'file2', 'class' => 'mb-4', 'required']) !!}
                    </div>
                    <div class="form-group button">
                        <button class="btn primary" type="submit" onclick="showFileSize()">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
