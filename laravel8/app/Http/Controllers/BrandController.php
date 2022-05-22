<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
class BrandController extends Controller
{
    //Fetch all brands

    public function getAllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

     // ADD NEW BRAND 
     public function addBrand(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ],
        [
            'brand_name.required' => 'Please enter a valid brand name',
            'brand_name.min' => 'Brand name must be at least 4 characters long',
        ]);

    //customize the image type
    $brand_image = $request->brand_image;
    $generateUniqId = hexdec(uniqid());

    $img_extension = strtolower($brand_image->getClientOriginalExtension());
    $img_name = $generateUniqId.'.'.$img_extension;
    $upload_location ="image/brand/";
    $upload_image = $upload_location.$img_name;
    $brand_image->move($upload_location,$img_name);

    //Brand inserted using  eloquent orm
       $result=  Brand::insert([
        'brand_name' => $request->brand_name,
        'brand_image' =>  $upload_image,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->back()->with('success','New Brand inserted successfuly');
    }

    //Edit Brand
    public function editBrand($id) {
        $brand = Brand::find($id);

        return view('admin.brand.edit',compact('brand'));
    }
}
