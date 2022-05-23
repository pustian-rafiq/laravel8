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

    //Update Brand
    public function updateBrand(Request $request,$id){
        $validateData = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please enter a valid brand name',
            'brand_name.min' => 'Brand name must be at least 4 characters long',
        ]);

        //remove the old images
        $old_image = $request->old_image;
       
        //customize the image type
        $brand_image = $request->brand_image;
        if($brand_image){
            $generateUniqId = hexdec(uniqid());

            $img_extension = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $generateUniqId.'.'.$img_extension;
            $upload_location ="image/brand/";
            $upload_image = $upload_location.$img_name;
            $brand_image->move($upload_location,$img_name);
    
            unlink($old_image);
            //Brand inserted using  eloquent orm
            $result=  Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' =>  $upload_image,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('all.brand')->with('success','New Brand updated successfuly');
        }else{
            $result=  Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->route('all.brand')->with('success','New Brand updated successfuly without image');
        }
        $generateUniqId = hexdec(uniqid());

        $img_extension = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $generateUniqId.'.'.$img_extension;
        $upload_location ="image/brand/";
        $upload_image = $upload_location.$img_name;
        $brand_image->move($upload_location,$img_name);

        unlink($old_image);
        //Brand inserted using  eloquent orm
        $result=  Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' =>  $upload_image,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.brand')->with('success','New Brand updated successfuly');
    }

    //Delete a brand
    public function deleteBrand($id) {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        unlink($old_image);

        $deleteBrand = Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand deleted successfuly');

    }
}
