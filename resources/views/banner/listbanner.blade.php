@extends('admin.master')
@section('listbanner')
<div class="content-wrapper">
    <div class="container-fluid">
        <h1 style="text-align:center">Manage Banner List</h1>
        <button class="btn btn-success" onclick="window.location='{{ url("/banner/addbanner") }}'">Add Banner</button>
        <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($records as $record)
                <tr>
                    <td>{{$record['id']}}</td>
                    <td>{{$record['title']}}</td>
                    <td>{{$record['slug']}}</td>
                    <td>{{$record['description']}}</td>
                    <td>
                        <img src="{{asset('uploads/'.$record->photo)}}" alt="Image" width="100px" height="50px">
                    </td>
                    <td>{{$record['status']}}</td>
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Are you sure?')" href={{"/banner/delete/".$record['id']}}><i class="fa fa-trash"></i></a></button>
                    <button class="btn btn-warning"> <a class="edit-del-link" href={{"/banner/edit/".$record['id']}}><i class="fa fa-edit"></i></a></button></td>
                </tr>
                @endforeach
            </table> 
    </div>
</div>
@endsection