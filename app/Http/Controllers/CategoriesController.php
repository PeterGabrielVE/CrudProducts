<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Image;
use App\Product;
use DB;


class CategoriesController extends Controller
{

    private $product;


    public function __construct(Product $product)
    {
        $this->product = $product;
        
    }


    //
    public function listCategory () {
        $categorias = Category::all();
        $productos = Product::all();
        $product    = $this->product->all();
        //$categories = Category::get()->pluck('id','title')->sort();
        $categories = DB::table('categories')->pluck('title','id')->sort();
        //dd($categories);

        return view('categories.list',compact('categorias','productos','categories','product') );
    }

    public function view ($id) {
        $category = Category::find($id);

         return response()->json($category);
    }

    public function getAllCategories () {
         $categories = Category::get(['id', 'title as text']);

         return ['results' => $categories];    
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
