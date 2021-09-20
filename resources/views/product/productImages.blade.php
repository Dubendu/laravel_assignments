@extends('admin.master')
@section('productimages')
<div class="content-wrapper">
    <div class="container">
    <h4 style="text-align:center;"> Display Product Images</h4><br><br>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button><br>
   <table class="table table-striped">
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Picture</th>
    </tr>
    </thead>
    <tbody>
       <tr>
           <td>{{$image->product_id}}</td>
           <td>{{$image->product->name}}</td>
           <td> 
                @foreach (explode('|', $image->images) as $picture) 
                 <img src="{{ asset('uploads/products/'.$picture) }}" style="height:200px; width:200px"/>
                @endforeach
           </td>
      </tr>
    </tbody>
   </table>
    </div>
</div>
@endsection