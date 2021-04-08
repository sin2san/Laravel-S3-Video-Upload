@extends('admin.layouts.app')

@section('htmlheader_title')
    Users
@endsection

@section('contentheader_title')
    List of {!! $module !!}s</span>
@endsection

@section('contentheader_description')

@endsection

@section('breadcrumb_title')
    <ol class="breadcrumb">
        <li><a href="{!! url('admin/dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="text-capitalize active">Users</li>
    </ol>
@endsection

@section('main-content')
    <div class="nav-tabs-custom">
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Ethnicity</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($users as $row)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{!! $count !!}</td>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! $row->email !!}</td>
                                    <td>@if($row->age) {!! $row->age !!} @else - @endif</td>
                                    <td>@if($row->gender) {!! $row->gender !!} @else - @endif</td>
                                    <td>@if($row->ethnicity) {!! $row->ethnicity !!} @else - @endif</td>
                                    <td>{!! $row->created_at->diffForHumans() !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
