<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getAllCategories(){
        //using eloquent orm
        // Fetches all categories from the database in ascending order of id
        //$categories = Category::all();

        // Fetches all categories from the database in descending order of id(last to first)
        //$categories = Category::latest()->get();

        // Using query builder
       // $categories =DB::table('categories')->latest()->get();

       // Fetches all categories using pagination
       $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    // ADD CATEGORY 
    public function addCategory(Request $request){
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255|min:3'
        ],
        [
            'category_name.required' => 'Please enter a valid category name',
            'category_name.min' => 'Category must be greater than or equal to 3',
            'category_name.unique' => 'Category must be unique',
        ]);

    // Store data into database using eloquent orm
    // 1.First technique
    // $result=  Category::insert([
    //     'category_name' => $request->category_name,
    //     'user_id' =>  Auth::user()->id,
    //     'created_at' => Carbon::now()
    // ]);



    //Second technique
    // It is recommended and best practice
    // $category = new Category;

    // $category->category_name = $request->category_name;
    // $category->user_id = Auth::user()->id;

    // $category->save();


    //Category inserted using query builder

    $data = array();

    $data['category_name'] = $request->category_name;
    $data['user_id'] = Auth::user()->id;
    $data['created_at'] = Carbon::now();

    DB::table('categories')->insert($data);

    return Redirect()->back()->with('success','Category inserted successfuly');
    }
   
}
