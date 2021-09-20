@extends('admin.master')
@section('updateproduct')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">Update Product</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button><br>
        <form action="/product/update" method='POST' enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product['id']}}">
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category_id" id="category_id">
                    <option value=""></option>
                    @foreach($categories as $categorie)
                    <option value="{{$categorie['id']}}" @if($product->category_id==$categorie->id) selected @endif>{{$categorie['name']}}</option>
                    @endforeach
                </select>
                <span id="err1" class="text-danger">@error('category_id'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Name</label>
                <input type="text" id="name" name="name"  class="form-control" value="{{$product['name']}}">
                <span id="err2" class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Price</label>
                <input type="number" id="price" name="price"  class="form-control" value="{{$product['price']}}">
                <span id="err3" class="text-danger">@error('price'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Product Description</label>
                <input type="text" id="description" name="description"  class="form-control" value="{{$product['description']}}">
                <span id="err4" class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label  class="form-label">Enter Stocks</label>
                <input type="number" id="stocks" name="stocks"  class="form-control" value="{{$product['stocks']}}">
                <span id="err5" class="text-danger">@error('stocks'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" id="image" name="image"  class="form-control">
                <span id="err6" class="text-danger">@error('image'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
            <img src="{{asset('uploads/products/'.$product->image)}}" alt="Image" width="80px" height="80px">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <br><br>
        </form>
    </div>
</div>
@endsection
