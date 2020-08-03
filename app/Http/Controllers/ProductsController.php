<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Image;
use App\Product;

class ProductsController extends Controller
{

        private $product;


        public function __construct(Product $product)
        {
            $this->product = $product;
            
        }
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
        //$product = Product::find($id);
        $product    = $this->product->find($id);

         return response()->json($product);
    }

    public function edit (Request $request) {
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->description = $request->description;
        

        $product->save();
        $product->categories()->attach($request->input('category_id'));
        $message = "Categoría fue editada exitosamente.";

        return response()->json($message);
    }

    public function remove ($id) {
        $product = Product::find($id);
    
        $product->delete();

        $message = "success";
        return response()->json($message);
    }
}
