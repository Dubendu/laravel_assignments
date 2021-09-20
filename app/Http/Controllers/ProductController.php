<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::all();
        return view('product.list',['products'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Category::whereNotNull('category_id')->get();
        return view('product.add',['categories'=>$data]);
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
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'stocks'=>'required',
            'image'=>'required'
        ]);
        $data=new Product();
        $data->category_id=$request->category_id;
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->stocks=$request->stocks;
        if($request->hasFile('image'))
        {
            $file=$request->file('image'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/products/',$filename);
            $data->image=$filename;  
        }        
        $data->save();
        return redirect('/product/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data=Product::paginate(5);
        return view('product.list',['products'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::findOrFail($id);
        $data2=Category::whereNotNull('category_id')->get();
        return view('product.update',['product'=>$data,'categories'=>$data2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data=Product::findOrFail($request->id);
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'stocks'=>'required'
        ]);
        $data->category_id=$request->category_id;
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->stocks=$request->stocks;
        if($request->hasFile('image'))
        {
            $file=$request->file('image'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/products/',$filename);
            $data->image=$filename;  
        }        
        $data->save();
        return redirect('/product/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data=Product::findOrFail($id);
        $data->delete();
        return redirect('/product/list');
    }
    public function display($id)
    {
        $data=Category::where("category_id",$id)->with(relations:"products")->get();
        return view('product.display',['categories'=>$data]);
    }

    public function extraImages($id){
        $data=Product::findOrFail($id);
        return view('product.extraImages',['product'=>$data]);
    }

    public function extraImagesStore(Request $request){
        $data=array();
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('uploads/products/', $name); 
                $data[] = $name;  
            }
        }
        ProductImage::insert( [
            'images'=>  implode("|",$data),
            'product_id' =>$request->product_id,
        ]);

        return redirect('/product/list');
    }
    public function productImages($id){
        $data=ProductImage::where("product_id",$id)->first();
        return view('product.productImages',['image'=>$data]);
    }
}
