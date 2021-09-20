@extends('admin.master')
@section('listuser')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center;">Show Users</h1>
            <button class="btn btn-success" onclick="window.location='{{ url("/useraccount") }}'">Add User</button>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['firstname']}}</td>
                    <td>{{$user['lastname']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['role']}}</td>
                    <td>{{$user['status']}}</td>
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Are you sure?')" href={{"delete/".$user['id']}}><i class="fa fa-trash"></i></a></button>
                    <button class="btn btn-warning"> <a class="edit-del-link" href={{"edit/".$user['id']}}><i class="fa fa-edit"></i></a></button></td>
                </tr>
                @endforeach
            </table> 
    </div> 
    <span style="text-align:center;">{{$users->links()}}</span>
</div>
@endsection