@extends('site.layouts.default')

@section('htmlheader_title')
    Feed
@endsection

@section('main-content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Feed</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-rss-square"></i>Feed</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mx-auto">
                    <div class="section-title">
                        <h1><span>Video</span> Feed</h1>
                        <p>Find the latest videos here</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($feeds as $row)
                    <!-- GETTING ENV VALUES -->
                    @php
                        $s3Client = new \Aws\S3\S3Client([
                            'region' => \Config::get('filesystems.disks.s3.region'),
                            'version' => 'latest',
                            'credentials' => [
                                'key' => \Config::get('filesystems.disks.s3.key'),
                                'secret' => \Config::get('filesystems.disks.s3.secret'),
                            ]
                        ]);

                        $cmd = $s3Client->getCommand('GetObject', [
                            'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
                            'Key' => 'thumbnails/'.$row->thumbnail,
                        ]);

                        $request = $s3Client->createPresignedRequest($cmd, '+180 minutes');

                        $presignedUrl = (string)$request->getUri();
                    @endphp
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4">
                        <div class="card">
                            <a href="{{ url('feed/video/' . \Crypt::encrypt($row->id)) }}">
                            <div class="video-thumbnail">
                                <img src="{{ $presignedUrl }}" class="img-responsive card-img-top video-thumb-img" />
                            </div>
                        </a>
                            <div class="card-body">
                                <div class="title">
                                <h5 class="mb-2 h5-spacing card-title"><a
                                        href="{{ url('feed/video/' . \Crypt::encrypt($row->id)) }}">{{ str_limit($row->title, 60) }}</a>
                                </h5>
                                <p>{{ $row->user->name }}</p>

                                @if($row->rating)
                                    @php
                                        $ratingsCount = App\VideoHasRating::where('video_id', $row->id)->count();
                                        $ratingsTotal = App\VideoHasRating::where('video_id', $row->id)->sum('rating');

                                        if($ratingsCount > 0 && $ratingsTotal > 0)
                                        {
                                            $totalAverage = $ratingsTotal/$ratingsCount;
                                        }
                                        else
                                        {
                                            $totalAverage = 0;
                                        }
                                    @endphp
                                    <div class="d-flex">
                                        @for ($i = 0; $i < round($totalAverage); $i++)
                                            <i class="fa fa-star color-gold"></i>
                                        @endfor
                                        @for ($i = 0; $i < 5 - round($totalAverage); $i++)
                                            <i class="fa fa-star-o color-gold"></i>
                                        @endfor
                                        <p class="ml-2"> <i class="fa fa-circle mr-1" style="font-size: 4px; color: #444;"></i> {{ $row->created_at->diffForHumans() }}</p>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center text-center my-5">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto text-center">
                    {{ $feeds->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
