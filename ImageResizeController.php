<?php
/**
|| Here I am using a laravel package called  intervention/image  
|| for details please go to the author website
|| http://image.intervention.io/
||  code example by : arafat
*/
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ImageResizeController extends Controller
{
    public function imageUpload(Request $request){
      $image       = $request->file('file');
      $ext         = $image->getClientOriginalExtension();
      //$filename  = $image->getClientOriginalName();
      $filename = round(microtime(true)).'.'.$ext;

      $image_resize = Image::make($image->getRealPath());              
      $image_resize->resize(100, 100);

      $image_resize->save(storage_path("app/public/".$filename));
    }
}
