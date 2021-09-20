@extends('admin.master')
@section('adduser')
<div class="content-wrapper">
    <div class="container">
    <h1 style="text-align:center;">User Registration</h1>
    <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form action="save" method='POST' id="userForm">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Enter First Name</label>
                <input type="text" id="firstname" name="firstname"  class="form-control">
                <span id="err1" class="text-danger">@error('firstname'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Last Name</label>
                <input type="text" id="lastname" name="lastname"  class="form-control">
                <span id="err2" class="text-danger">@error('lastname'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Email</label>
                <input type="text" id="email" name="email"  class="form-control">
                <span id="err3" class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Password</label>
                <input type="password" id="password" name="password"  class="form-control">
                <span id="err4" class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Re-Confirm Password</label>
                <input type="password" id="confpassword" name="confpassword" class="form-control">
                <span id="err5" class="text-danger">@error('confpassword'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="status" id="active" class="form-check-input" value="Active">
                <label class="form-check-label">Active</label>
                <span name="err6" class="text-danger">@error('status'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 form-check form-check-inline"> 
                <input type="radio" name="status" id="inactive" class="form-check-input" value="Inactive">
                <label class="form-check-label">Inactive</label>
                <span name="err6" class="text-danger">@error('status'){{$message}}@enderror</span>
            </div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='role' id="role">
                @foreach($roles as $role)
                {{$sel=''}}
                @if($role['role_name']=='customer')
                {{$sel='selected=selected'}}
                @endif
                <option value="{{$role['role_name']}}" {{$sel}}>{{$role['role_name']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Add User</button>
            <br><br>
        </form>
    </div>
</div>
@endsection
