@extends('admin.master')
@section('addbanner')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Add Banner</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button><br>
        <form action="/banner/addbanner" id="bannerForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Enter Title</label>
                <input type="text" id="title" name="title"  class="form-control">
                <span id="err1" class="text-danger">@error('title'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Slug</label>
                <input type="text" id="slug" name="slug"  class="form-control">
                <span id="err2" class="text-danger">@error('slug'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Description</label>
                <input type="text" id="description" name="description"  class="form-control">
                <span id="err3" class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" id="photo" name="photo"  class="form-control">
                <span id="err4" class="text-danger">@error('photo'){{$message}}@enderror</span>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Add Banner</button>
            <br>
        </form>
    </div>
</div>
@endsection

