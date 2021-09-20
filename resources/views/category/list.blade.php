@extends('admin.master')
@section('listcategory')
</style>
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center">Manage Category List</h1>
        <button class="btn btn-success" onclick="window.location='{{ url("/category/add") }}'">Add Category</button>
        <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Category/SubCategory Name</th>
                    <th>Parent Category Name</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td>{{$category['name']}}</td>
                    <td>
                        @if($category->category_id)
                        {{$category->parent->name}}
                        @else
                        Major Category
                        @endif
                    </td>
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Are you sure?')" href={{"/category/delete/".$category['id']}}><i class="fa fa-trash"></i></a></button>
                    <button class="btn btn-warning"> <a class="edit-del-link" href={{"/category/edit/".$category['id']}}><i class="fa fa-edit"></i></a></button></td>
                </tr>
                @endforeach
            </table> 
    </div>
    <span style="text-align:center;">{{$categories->links()}}</span>
</div>
@endsection