@extends('admin.master')
@section('productdisplay')
<style>
     #display-container{
      margin:30px;
    }
</style>
<div class="content-wrapper">
    <div class="container">
    @foreach($categories as $category)
    <h3 class="text-center">{{$category->name}}</h3>
        <div class="row" id="display-container">
            @foreach($category->products as $product)
                <div class="col">
                    <img src="{{asset('uploads/products/'.$product->image)}}" alt="Image" width="200px" height="150px">
                    <p>{{$product->name}}</p>
                    <p><b>{{$product->price}}</b></p>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection
