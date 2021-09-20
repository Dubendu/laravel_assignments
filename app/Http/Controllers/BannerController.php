<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        return view('banner.home', ['banners'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('banner.banner');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'photo'=>'required'
        ]);
        $banner=new Banner();
        $banner->title=$req->input('title');
        $banner->slug=$req->input('slug');
        $banner->description=$req->input('description');
        if($req->hasFile('photo'))
        {
            $file=$req->file('photo'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/',$filename);
            $banner->photo=$filename;  
        }        
        $banner->save();
        return redirect('/banner/listbanner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=Banner::all();
        return view('banner.listbanner',['records'=>$data]);
    }
    public function delete($id){
        $data=Banner::find($id);
        $data->delete();
        return redirect('/banner/listbanner');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Banner::find($id);
        return view('banner.updatebanner',['banners'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data=Banner::find($req->id);
        $req->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
        ]);
        $data->title=$req->title;
        $data->slug=$req->slug;
        $data->description=$req->description;
        if($req->hasFile('photo'))
        {
            $file=$req->file('photo'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/',$filename);
            $data->photo=$filename;  
        }        
        $data->save();
        return redirect('/banner/listbanner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
