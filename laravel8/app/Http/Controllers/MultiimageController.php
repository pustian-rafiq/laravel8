<?php

namespace App\Http\Controllers;
use App\Models\Multiimage;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
class MultiimageController extends Controller
{
    public function multipleImage(){
        $multiInages = Multiimage::all();
        return view('admin.multipleimage.index', compact('multiInages'));
    }

    //Store multiple image 
    public function addMultipleImage(Request $request){
        // $validateData = $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        // ]);
        // Upload image using image intervention package

        $image = $request->file('image');

        foreach( $image as $multiImage){

            $generateUniqId = hexdec(uniqid()).'.'.$multiImage->getClientOriginalExtension();
            Image::make($multiImage)->resize(300,200)->save('image/multi/'.$generateUniqId);
            $upload_image = 'image/multi/'.$generateUniqId;
        
            //Brand inserted using  eloquent orm
               $result=  Multiimage::insert([
                'image' =>  $upload_image,
                'created_at' => Carbon::now()
            ]);
        }

      
    
        return Redirect()->back()->with('success','Multiple images added successfuly');
    }
}
