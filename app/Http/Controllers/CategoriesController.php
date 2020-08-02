<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Image;
use App\Product;


class CategoriesController extends Controller
{
    //
    public function listCategory () {
        $categorias = Category::all();
        $productos = Product::all();

        return view('categories.list',
            [
                'categorias' => $categorias,
                'productos' => $productos
            ]
        );
    }

    public function view ($id) {
        $category = Category::find($id);

         return response()->json($category);
    }

    public function add (Request $request) {
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        $message = "Categoría fue creada exitosamente.";

        return response()->json($message);

    }

    public function edit (Request $request) {
        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->description = $request->description;
        
        $category->save();
        $message = "Categoría fue editada exitosamente.";

        return response()->json($message);
    }

   

    public function remove ($id) {
        $category = Category::find($id);
    
        $category->delete();

        $message = "success";
        return response()->json($message);
    }

    
}
