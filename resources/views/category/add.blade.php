@extends('admin.master')
@section('addcategory')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Add Category</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form action="/category/add" id="categoryForm" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Category Name</label>
                <input type="text" id="name" name="name"  class="form-control">
                <span id="err1" class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Sub Category Of</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id" id="category_id">
                    <option value=""></option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
            </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <br>
        </form>
    </div>
</div>
@endsection
