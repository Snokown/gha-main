@extends('layouts.app')

@section('pageTitle')
    {{$title}}
@endsection

@section('assets')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<div class="wrapper">
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row row-jumbo">
            <div class="col-md-8 align-middle">
                <h1 class="main">{{$jumbotron_heading_1}}</h1>
                <p class="sub">{{$jumbotron_heading_2}}</p>
            </div>
            <div class="col-md-4 help-box align-middle">
                <div class="card">
                    <div class="card-body text-center">
                        <span class="help">We're Here to Help</span>
                        <br/>
                        <span class="help2">Give Us a Call</span>
                        <br/>
                        <i class="fas fa-phone fa-fw"></i><a href="tel:1-978-646-0091">978-646-0091</a>
                        <br/>
                        <span class="small">OR</span>
                        <br/>
                        <a href="" class="btn btn-brand-primary">Request Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 separator-secondary">
    </div>
</div>

<div class="row bg-brand-primary about-section">
    <div class="col bg-white my-4 p-4 mx-auto about-inner">
        <div class="about-section-title text-center">About Us</div>
        <hr class="short-hr"/>
        <p class="about-content">
            {{$about_us}}
        </p>
    </div>
</div>

<div class="row news-section bg-white">
    <div class="col my-4 p-4 mx-auto news-inner">
        <div class="col news-section-title mb-4">Latest News</div>
        <div class="card-deck">
            @foreach($posts as $post)
                @if($post->published)
                <div class="card">
                    <img class="card-img-top" src="{{$post->image->path}}" alt="Card image cap">
                    <div class="card-body">
                    <small class="card-text"><?php echo gmdate("F jS Y", $post->_created); ?></small>
                    <h5 class="card-title">{{$post->title}}</h5>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

    </div>
</div>

<div class="row services-section bg-light">
    <div class="col-6 services-content bg-white">
        <div class="news-section-title">Services</div>
        <p>{!!$services!!}</p>
        <br/>
        <div class="text-center">
            <a href="/services" class="btn btn-brand-primary">Explore Our Services</a>
        </div>
    </div>
    <div class="col-2 services-image">
        <img src="{{$service_image->path}}"/>
    </div>
</div>

</div>

@endsection