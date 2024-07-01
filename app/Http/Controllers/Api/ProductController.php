<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function store(Request $request){
        $product = new Product();

        // $validatedData = $request->validate([
        //     'description' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|integer'
        // ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        $product->save();

        return redirect()->route('index');
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        $product->save();
        return redirect()->route('index');
    }

    public function destroy($id){

        Product::destroy($id);
       return response()->json(['message'=> "Deleted"], Response::HTTP_OK);

    }
}
