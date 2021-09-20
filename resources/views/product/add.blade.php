@extends('admin.master')
@section('addproduct')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Add Product</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form action="/product/add" id="productForm" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id" id="category_id">
                    <option value=""></option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
                <span id="err1" class="text-danger">@error('category_id'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Name</label>
                <input type="text" id="name" name="name"  class="form-control">
                <span id="err2" class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Price</label>
                <input type="number" id="price" name="price"  class="form-control">
                <span id="err3" class="text-danger">@error('price'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Description</label>
                <input type="text" id="p_description" name="description"  class="form-control">
                <span id="err4" class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Stocks</label>
                <input type="number" id="stocks" name="stocks"  class="form-control">
                <span id="err5" class="text-danger">@error('stocks'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" id="image" name="image"  class="form-control">
                <span id="err6" class="text-danger">@error('image'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <br><br>
        </form>
    </div>
</div>
@endsection
