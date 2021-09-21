<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::whereNull('category_id')->get();
        return view('category.add',['categories'=>$data]);
    }

    public function trash()
    {
        $data=Category::onlyTrashed()->get();
        return view('category.category-trash',['categories'=>$data]);
    }
    public function restore($id)
    {
        $data=Category::withTrashed()->findOrFail($id);
        $data->restore();
        return redirect('/category/list');
    }
    public function forceDelete($id)
    {
        $data=Category::withTrashed()->findOrFail($id);
        $data->forceDelete();
        return redirect('/category/list');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->category_id=$request->category_id;
        $category->save();
        return redirect('/category/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data=Category::paginate(5);
        return view('category.list',['categories'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        $categories=Category::whereNull('category_id')->get();
        return view('category.update',compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data=Category::findOrFail($request->id);
        $data->name=$request->name;
        $data->category_id=$request->category_id;
        $data->save();
        return redirect('/category/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data=Category::findOrFail($id);
        $data->delete();
        return redirect('/category/list');
    }
}
