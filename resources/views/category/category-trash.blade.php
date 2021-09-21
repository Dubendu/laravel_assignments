@extends('admin.master')
@section('trashcategory')
</style>
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center">Manage Category Trash</h1>
        <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
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
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Are you sure? Data will delete permanently.')" href={{"/category/force-delete/".$category['id']}}>Delete</a></button>
                    <button class="btn btn-success"> <a class="edit-del-link" href={{"/category/restore/".$category['id']}}>Restore</a></button></td>
                </tr>
                @endforeach
            </table> 
    </div>
</div>
@endsection