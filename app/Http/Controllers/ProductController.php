<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
Use Image;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::getProducts();
        return response()->json([
            'products'=>$products
        ],200);
    }

    public function addProduct(Request $request){
        // dd($request->file('file'));
        // $image = $request->file('img_src');
        // $filename = time().'.'.$image->getClientOriginalExtension();
        // $image_resize = Image::make($image->getRealPath());
        // $image_resize->fit(250);
        // $image_resize->save(public_path('/imgs/'.$filename));
        
       
        // if(!empty($request->image)){
        //     $image = $request->file('image');
        //     $filename = time().'.'.$image->getClientOriginalExtension();
        //     $image_resize = Image::make($image->getRealPath());
        //     $image_resize->fit(250);
        //     $image_resize->save(public_path('/product-images/'.$filename));
        //     // $strpos = strpos($request->image,';');
        //     // $sub = substr($request->image,0,$strpos);
        //     // $ex = explode('/',$sub)[1];
        //     // $name = time() .".".$ex;
        //     // $img = Image::make($request->image)->resize(200,200);
        //     // $upload_path = public_path()."/product-images/";
        //     // $img->save($upload_path,$name);
        //     // $product->image = $name;
        //     $product_image = $filename;
        // }else{
        //     $product_image = "no-image.png";
        // }
        $product =  [
                        'name'           =>  $request->name,
                        'description'    =>  $request->description,
                        // 'image'          =>  $product_image,
                        'type'           =>  $request->type,
                        'quantity'       =>  $request->quantity,
                        'price'          =>  $request->price
                    ];
        $result =   Product::addDataTable('products', $product);
    }

    public function getProductDetails($id){
        $product_details = Product::getProductDetails($id);
        return response()->json($product_details);
    }

    public function updateProduct(Request $request){
        $product =  [
                        'id'             =>  $request->id,
                        'name'           =>  $request->name,
                        'description'    =>  $request->description,
                        // 'image'          =>  $product_image,
                        'type'           =>  $request->type,
                        'quantity'       =>  $request->quantity,
                        'price'          =>  $request->price
                    ];
        $result =   Product::updateDataTable('products', $product);
        return response()->json($result);
    }

    public function deleteProduct($id){
       
        $result = Product::deleteProduct($id);
       
        return response()->json($result);
    }
}
