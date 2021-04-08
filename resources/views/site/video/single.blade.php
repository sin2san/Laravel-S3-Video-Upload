@extends('site.layouts.default')

@section('htmlheader_title')
    {{ $singleData->title }}
@endsection

@section('main-content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{ str_limit($singleData->title, 30) }}</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="{{ url('/') }}"><i class="fa fa-rss-square"></i>Feed</a></li>
                        <li class="active"><a href="#">{{ str_limit($singleData->title, 30) }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">{!! session('success') !!}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{!! session('error') !!}</div>
                    @endif

                    <!-- GETTING ENV VALUES -->
                    @php
                        $s3Client = new \Aws\S3\S3Client([
                            'region' => \Config::get('filesystems.disks.s3.region'),
                            'version' => 'latest',
                            'credentials' => [
                                'key' => \Config::get('filesystems.disks.s3.key'),
                                'secret' => \Config::get('filesystems.disks.s3.secret'),
                            ],
                        ]);

                        $cmd = $s3Client->getCommand('GetObject', [
                            'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
                            'Key' => 'videos/' . $singleData->video,
                        ]);

                        $cmdImage = $s3Client->getCommand('GetObject', [
                            'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
                            'Key' => 'thumbnails/' . $singleData->thumbnail,
                        ]);

                        $requestVideo = $s3Client->createPresignedRequest($cmd, '+60 minutes');
                        $requestImage = $s3Client->createPresignedRequest($cmdImage, '+60 minutes');

                        $presignedUrlVideo = (string) $requestVideo->getUri();
                        $presignedUrlImage = (string) $requestImage->getUri();
                    @endphp

                    <div class="mb-4">
                        <div id="wrapperSingle">
                            <video id="video{{ $singleData->id }}" class="js-player" playsinline controls
                                data-poster="{{ $presignedUrlImage }}" style="--plyr-color-main: #ec1d25;"
                                allowfullscreen>
                                <source src="{{ $presignedUrlVideo }}" type="video/mp4" />
                                Your browser does not support videos.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    <div class="d-flex">
                        <div style="vertical-align: middle; margin-right: 15px;">
                            <i class="fa fa-user-circle-o" style="font-size: 50px; color: #ddd;"></i>
                        </div>
                        <div>
                            <p class="text-capitalize" style="font-weight: 600;"> {{ $singleData->user->name }}</p>
                            <p>{{ $singleData->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    <hr class="line-rating" />
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    <h5 class="mb-2 h5-spacing">{{ $singleData->title }}</h5>
                    <p class="mb-2"><em>{{ $singleData->description }}</em></p>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    <hr class="line-rating" />
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                    @if (!$checkRating && $singleData->user_id !== Auth::id())
                        <p>Would you like to rate?</p>
                        <div class="stars">
                            {!! Form::model(null, ['autocomplete' => 'off', 'files' => 'true']) !!}
                            {!! csrf_field() !!}
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                            <label class="star star-1" for="star-1"></label>
                            <div class="form-group button">
                                <button class="btn primary" type="submit">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            </div>
            @if (!$checkRating && $singleData->user_id !== Auth::id())
                <div class="row">
                    <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                        <hr class="line-rating" />
                    </div>
                </div>
            @endif

            @if (count($ratings) > 0)
                @foreach ($ratings as $row)
                    <div class="row">
                        <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                            <div class="d-flex">
                                <div style="vertical-align: middle; margin-right: 15px;">
                                    <i class="fa fa-user-circle-o" style="font-size: 50px; color: #ddd;"></i>
                                </div>
                                <div>
                                    <p>{{ $row->user->name }}</p>
                                    @for ($i = 0; $i < $row->rating; $i++)
                                        <i class="fa fa-star color-gold"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $row->rating; $i++)
                                        <i class="fa fa-star-o color-gold"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto">
                            <hr class="line-rating" />
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row justify-content-center text-center">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto text-center">
                    {{ $ratings->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
