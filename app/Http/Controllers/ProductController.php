<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(3);
        return view('products.index',['products'=>$products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'sprice'=>'required|numeric',
            'sku'=>'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

         if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = "uploads/products/";
            $file->move($path,$filename);
         }


        Product::create([
            'name'=>  $request->name,
            'description' => $request->description,
            'image' => $path.$filename,
            'price' => $request->price,
            'sprice' => $request->sprice,
            'sku' => $request->sku,

        ]);
        return back()->withSuccess('Product has been added!');
    }

    public function show($id){
        $product = Product::where('id',$id)->first();
        return view('products.show',['product'=>$product]);
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'sprice'=>'required|numeric',
            'sku'=>'required',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $editProduct = Product::findOrFail($id);

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = "uploads/products/";
            $file->move($path,$filename);

            if(File::exists($editProduct->image)){
                File::delete($editProduct->image);
            }
         }

        $editProduct->update([
             'name'=>  $request->name,
            'description' => $request->description,
            'image' => $path.$filename,
            'price' => $request->price,
            'sprice' => $request->sprice,
            'sku' => $request->sku,
        ]);

        return back()->withSuccess('Product has been Edited!');



    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();

        $product->delete();
        return back()->withSuccess('Product has been deleted!');
    }
}
