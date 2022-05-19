<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories(){
        return view('admin.category.index');
    }

    // ADD CATEGORY 
    public function addCategory(Request $request){
        $validateData = $request->validate([
            'category_name' => 'required|unique:categores|max:255|min:3'
        ],
        [
            'category_name.required' => 'Please enter a valid category name'
        ]);
    }
}
