<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
      if(auth()->user()){

       $categories = Category::all();
      return view('product.create_product',compact('categories'));
      }
      return redirect(route('login'))->with('register_company','Please Login ');

    	
    }

    public function show(){

    	$all_products = Product::all();
    	$product = Product::find(1);
    	// foreach ($product->categories as $pro) {
  
    	// 	 $tofindName = $pro->pivot->category_id;
    	// 	 $name = Category::find($tofindName)->title;

    	// }
//query builder 

   //  	$users = \DB::table('Products')
   //          ->join('category_product', 'Products.id', '=', 'category_product.product_id')
   //          ->select('Products.*', 'category_product.category_id')
   //          ->get();
   //     $inserted= \DB::table('category_product')->insert(
   //      	 ['product_id' => 50, 'category_id' => 70]);
   // echo $inserted;

     
    	return view('product.allproducts',compact('all_products','cat'));
    }

    public function create(Request $request){

    	$request->validate([
    		'product_name' => 'required',
    		'product_price' => 'required',
    		'myfile' => 'required|nullable|max:1999'
    	]);


// handle file upload
      if($request->hasfile('myfile')){

        //Retrieving The Original Name Of An Uploaded File
        $filenameWithExt = $request->file('myfile')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

     //Retrieving The Extension Of An Uploaded File
        $extension = $request->file('myfile')->getClientOriginalExtension();

        $fileNameToStore = $filename. '_'.time(). '.' .$extension;

        $path = $request->file('myfile')->storeAs('public/myfile',$fileNameToStore);

      }else{
        $fileNameToStore ='nofile.jpg';
      }


    	$product = new Product([
    		'name' => $request->get('product_name'),
    		'price' => $request->get('product_price'),
    		'file' => $fileNameToStore
    	]);


        $product->save();

        $product_id = $product->id;
        $category_ids = $request->get('category_ids');
        foreach($category_ids as $category_id)
          { 
          	    // $category_id = $request->get('category_id');
           		$product->categories()->attach($category_id);
           }
 		echo "saved and attached !";
    }
}
