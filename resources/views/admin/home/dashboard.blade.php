@extends('admin.layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')
    Dashboard
@endsection

@section('contentheader_description')

@endsection

@section('breadcrumb_title')
@endsection

@section('main-content')
<section id="dashboard" class="content">
    <div class="row">
        @can('manage admins')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a>
                    <span class="info-box-icon bg-green"><i class="fa fa-user-secret"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Admins</span>
                    <span class="info-box-number">{{ $admins }}</span>
                </div>
            </div>
        </div>
        @endcan

        @can('manage users')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="{{ url('admin/users') }}">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{ $users }}</span>
                </div>
            </div>
        </div>
        @endcan

        @can('manage videos')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="{{ url('admin/videos') }}">
                    <span class="info-box-icon bg-red"><i class="fa fa-video-camera"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Videos</span>
                    <span class="info-box-number">{{ $videos }}</span>
                </div>
            </div>
        </div>
        @endcan

        @can('manage payments')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a>
                    <span class="info-box-icon bg-purple"><i class="fa fa-usd"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Payments</span>
                    <span class="info-box-number">{{ $payments }}</span>
                </div>
            </div>
        </div>
        @endcan

    </div>
</section>
@endsection
