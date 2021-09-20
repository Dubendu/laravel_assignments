@extends('admin.master')
@section('home')
<style>
    #carouselinner{
        background-color:white;
        color:black;
        font-family: "Brush Script MT", "Lucida Handwriting", Cursive;
        font-weight:bold;
        opacity:0.5;
        font-size:20px;
    }
</style>
<div class="content-wrapper">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach( $banners as $banner )
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" class="{{ $loop->first?'active':''}}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach($banners as $banner)
    <div class="carousel-item {{$banner['id']==1?'active':''}}">
      <img src="{{asset('uploads/'.$banner->photo)}}" height="400px" class="d-block w-100" alt="...">
      <div id="carouselinner" class="carousel-caption d-none d-md-block">
        <button><a href="{{$banner->slug}}" style="text-decoration:none; color:black;"><b>Shop Now</b></a></button>
        <h5><b>{{$banner['title']}}</b></h5>
        <p>{{$banner['description']}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
@endsection