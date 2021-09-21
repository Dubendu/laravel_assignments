@extends('admin.master')
@section('trashproduct')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center">Manage Product Trash</h1>
        <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Stocks</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>
                        @if($product->category_id)
                        {{$product->category->name}}
                        @endif
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product['description']}}</td>
                    <td>{{$product['stocks']}}</td>
                    <td>
                        <a href="{{route('product.showImages',$product->id)}}"><img src="{{asset('uploads/products/'.$product->image)}}" alt="Image" width="80px" height="50px"></a>
                    </td>
                    <td>
                    <button class="btn btn-danger"><a class="edit-del-link" title="Delete" onclick="return confirm('Are you sure? Data will delete permanently')" href={{"/product/force-delete/".$product['id']}}>Delete</a></button>
                    <button class="btn btn-success"> <a class="edit-del-link" title="Edit" href={{"/product/restore/".$product['id']}}>Restore</a></button></td>
                </tr>
                @endforeach
            </table> 
    </div>
</div>
@endsection