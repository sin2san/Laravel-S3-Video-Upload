@extends('admin.layouts.app')

@section('htmlheader_title')
    Videos
@endsection

@section('contentheader_title')
    List of {{$module}}s</span>
@endsection

@section('contentheader_description')

@endsection

@section('breadcrumb_title')
    <ol class="breadcrumb">
        <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="text-capitalize active">Videos</li>
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
                                    <th>Title</th>
                                    <th>Average Rating (5)</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($videos as $row)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td><a href="{{ url('feed/video/' . \Crypt::encrypt($row->id)) }}" style="font-weight: 600;" target="_blank">{!!$row->title!!}</a></td>
                                    <td>
                                        @php
                                            $rating = App\VideoHasRating::where('video_id', $row->id)->sum('rating');
                                            $ratingCount = App\VideoHasRating::where('video_id', $row->id)->count();

                                            if($ratingCount){
                                                $avg = $rating / $ratingCount;
                                            }else{
                                                $avg = 0;
                                            }
                                        @endphp
                                        @if($avg)
                                            {!! number_format($avg, 1) !!}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->user_id)
                                            {!!$row->user->name!!}
                                        @endif
                                    </td>
                                        <td>{!!$row->created_at->diffForHumans()!!}</td>
                                    <td>
                                        <a href="{{ url('feed/video/' . \Crypt::encrypt($row->id)) }}" class="btn btn-sm btn-success" target="_blank"> <i class="fa fa-search-plus"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!!$videos->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
