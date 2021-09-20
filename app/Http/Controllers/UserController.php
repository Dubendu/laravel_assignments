<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Useraccount;
use App\Models\role;

class UserController extends Controller
{
    function index(){
        $role_data=role::all();
        return view('user',['roles'=>$role_data]);
    }
    function store(Request $req){
        $data=$req->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required|max:12|min:8',
            'confpassword'=>'required|same:password',
            'role'=>'required',
            'status'=>'required'
        ]);
        Useraccount::create($data);
        return redirect('list');
    }
    function show(){
        $record=Useraccount::paginate(5);
        return view('list',['users'=>$record]);
    }

    function delete($id){
        $data=Useraccount::findOrFail($id);
        $data->delete();
        return redirect('list');
    }

    function edit($id){
        $data=Useraccount::findOrFail($id);
        $role_data=role::all();
        return view('update',['data'=>$data,'roles'=>$role_data]);
    }

    function updateStore(Request $req){
        $data=Useraccount::findOrFail($req->id);
        $req->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'role'=>'required',
            'status'=>'required' 
        ]);
        $data->firstname=$req->firstname;
        $data->lastname=$req->lastname;
        $data->email=$req->email;
        $data->role=$req->role;
        $data->status=$req->status;
        $data->save();
        return redirect('list'); 
    }
    
}
