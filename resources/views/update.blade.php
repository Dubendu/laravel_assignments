@extends('admin.master')
@section('updateuser')
<div class="content-wrapper">
    <div class="container">
       <h1 style="text-align:center;">Update User</h1>
       <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form action="/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="mb-3">
                <label  class="form-label">Enter First Name</label>
                <input type="text" name="firstname"  class="form-control" value="{{$data['firstname']}}">
                <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Last Name</label>
                <input type="text" name="lastname"  class="form-control" value="{{$data['lastname']}}">
                <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Email</label>
                <input type="text" name="email"  class="form-control" value="{{$data['email']}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="status" id="active" class="form-check-input" value="Active">
                <label class="form-check-label">Active</label>
                <span class="text-danger">@error('status'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 form-check form-check-inline"> 
                <input type="radio" name="status" id="inactive" class="form-check-input" value="Inactive">
                <label class="form-check-label">Inactive</label>
                <span class="text-danger">@error('status'){{$message}}@enderror</span>
            </div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='role' value="{{$data['role']}}">
                @foreach($roles as $role)
                {{$sel=''}}
                @if($role['role_name']=='customer')
                {{$sel='selected=selected'}}
                @endif
                <option value="{{$role['role_name']}}" {{$sel}}>{{$role['role_name']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Update User</button>
        </form>
    </div>
</div>
@endsection

