<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of all the products and their details.
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Used for adding a new product after validation.
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'product_name'=>'required | min:3 max:150',
            'product_detail'=>'required',
            'product_cost'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()],422);
        }
        return response()->json(Product::create($request->all()),201);
    }

    /**
     * Display the specified product from products table.
     */
    public function show($id)
    {
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product not found.'],404);
        }
        return response()->json(Product::find($id),200);
    }

    /**
     * Update the specified product in the product table.
     */
    public function update(Request $request, $id)
    {
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product not found.'],404);
        }
        $validator =Validator::make($request->all(),[
            'product_name'=>'required | min:3 max:150',
            'product_detail'=>'required',
            'product_cost'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()],422);
        }
        $product->update($request->all());
        return response()->json($product,200);
    }

    /**
     * Remove the specified product from the products table.
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product not found.'],404);
        }
        $product->delete();
        return response()->json(null,204);
    }
}
