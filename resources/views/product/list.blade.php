@extends('admin.master')
@section('listproduct')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center">Manage Product List</h1>
        <button class="btn btn-success" onclick="window.location='{{ url("/product/add") }}'">Add Product</button>
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
                    <td><button class="btn btn-primary"><a class="edit-del-link" title="Add" href="{{route('product.extraImages',$product->id)}}"><i class="fa fa-table"></i></a></button>
                    <button class="btn btn-danger"><a class="edit-del-link" title="Delete" onclick="return confirm('Are you sure?')" href={{"/product/delete/".$product['id']}}><i class="fa fa-trash"></i></a></button>
                    <button class="btn btn-warning"> <a class="edit-del-link" title="Edit" href={{"/product/edit/".$product['id']}}><i class="fa fa-edit"></i></a></button></td>
                </tr>
                @endforeach
            </table> 
    </div>
    <span style="text-align:center;">{{$products->links()}}</span>
</div>
@endsection