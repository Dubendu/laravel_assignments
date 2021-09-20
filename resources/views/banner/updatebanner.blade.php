@extends('admin.master')
@section('updatebanner')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Update Banner</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form action="/banner/update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$banners['id']}}">
            <div class="mb-3">
                <label  class="form-label">Enter Title</label>
                <input type="text" id="title" name="title"  class="form-control" value="{{$banners['title']}}">
                <span id="err1" class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{$banners['slug']}}">
                <span id="err2" class="text-danger">@error('slug'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Description</label>
                <input type="text" id="description" name="description"  class="form-control" value="{{$banners['description']}}">
                <span id="err3" class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" id="photo" name="photo"  class="form-control">
                <span id="err4" class="text-danger">@error('photo'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
            <img src="{{asset('uploads/'.$banners->photo)}}" alt="Image" width="80px" height="80px">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update Banner</button>
            <br><br>
        </form>
    </div>
</div>
@endsection

