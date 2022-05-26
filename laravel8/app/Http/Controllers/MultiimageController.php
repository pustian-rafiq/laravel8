<?php

namespace App\Http\Controllers;
use App\Models\Multiimage;
use Illuminate\Http\Request;

class MultiimageController extends Controller
{
    public function multipleImage(){
        $multiInages = Multiimage::all();
        return view('admin.multipleimage.index', compact('multiInages'));
    }
}
