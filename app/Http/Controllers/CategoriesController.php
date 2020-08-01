<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function listCategory () {
        $categorias = Category::all();

        return view('categories.list',
            [
                'categorias' => $categorias
            ]
        );
    }

}
