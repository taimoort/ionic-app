<?php

namespace App\Http\Controllers;
use App\Products;
use App\Helpers\APIHelpers;
use Illuminate\Http\Request;

class CrudOperations extends Controller
{
    public function getProducts(Request $request)
    {
      $products = Products::all()->toJson(JSON_PRETTY_PRINT);
      if($products){
        return response($products, 200);
    }else{
        return response()->json([
            "message" => "Products not added"
          ], 404);
    }
       // $UserID = $request->UserID;
        //if (Products::where('UserID', $UserID)->exists()) {
          //  $products = Products::where('UserID', $UserID)->get()->toJson(JSON_PRETTY_PRINT);
           // return response($products, 200);
         // } else {
           // return response()->json([
             // "message" => "Products not found"
            //], 404);
          //}
    }
    public function addProduct(Request $request)
    {
        $product = new Products();
        $product->UserID = $request->UserID;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_description = $request->product_description;
        $product->category = $request->category;
        $product->barcode = $request->barcode;
        $product_save = $product->save();
        if($product_save){
            return response()->json([
                "message" => "Products  added"
              ],200);
        }else{
            return response()->json([
                "message" => "Products not added"
              ], 404);
        }
    }
    public function getItem($id)
    {
        
         
        if (Products::where('id', $id)->exists()) {
            $products = Products::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($products, 200);
          } else {
            return response()->json([
              "message" => "Products not found"
            ], 404);
          }
    }

    public function updateproduct($id,Request $request)
    {
        $product = Products::find($id);
       // $product->id = $id;
        $product->UserID = $request->UserID;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->product_description = $request->product_description;
        $product->category = $request->category;
        $product->barcode = $request->barcode;
        $product_update = $product->save();
        if($product_update){
          
        return response()->json("Products updated",200);
        }else{
        return response()->json("Products not updated",400);
        }
    }

    public function deleteproduct($id)
    {
        $product = Products::find($id);
        $product_delete = $product->delete();
        if($product_delete){
          return response()->json("Products deleted",200);
        }else{
        return response()->json("Products not deleted",400);
        }
    }
}
