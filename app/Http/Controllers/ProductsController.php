<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Image;
use App\Product;

class ProductsController extends Controller
{
     public function add (Request $request) {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->categories;
        $product->save();

        $message = "Producto fue creado exitosamente.";

        return response()->json($message);

    }

    public function view ($id) {
        $product = Product::find($id);

         return response()->json($product);
    }
}
