@extends('admin.master')
@section('updatecategory')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Update Category</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button><br>
        <form action="/category/update" method='POST' enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$category['id']}}">
            <div class="mb-3">
                <label  class="form-label">Category Name</label>
                <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Sub Category</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id" id="category_id">
                    <option value="" @if($category->category_id==null) selected @endif></option>
                    @foreach($categories as $categorie)
                    <option value="{{$categorie['id']}}" @if($category->category_id!=null && $category->category_id==$categorie->id) selected @endif> {{$categorie['name']}}</option>
                    @endforeach
            </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <br><br>
        </form>
    </div>
</div>
@endsection
