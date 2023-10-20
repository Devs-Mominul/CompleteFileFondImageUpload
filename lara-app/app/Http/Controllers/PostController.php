<?php

namespace App\Http\Controllers;

use App\Models\Posted;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function index(){
        return view('welcome');
    }
    function store(Request $request){
        $temp_file=TempFile::where('folder',$request->image)->first();
        // if($request->hasFile('image')){
        //     $image=$request->file('image');
        //     $file_name=$image->getClientOriginalExtension();
        //     $folder=uniqid('post',true);
        //     $image->storeAs('posts/temp/'.$folder.$file_name);
        //     Posted::create([
        //         'name'=>$request->name,
        //         'image'=>$folder.'/'.$file_name
        //     ]);
        // }
        if($temp_file){
            Storage::copy('posts/temp/'.$temp_file->folder.'/'.$temp_file->filename,'posts/'.$temp_file->folder.'/'.$temp_file->filename);
            Posted::create([
                        'name'=>$request->name,
                        'image'=>$temp_file->folder.'/'.$temp_file->file_name
                    ]);
                    Storage::deleteDirectory('posts/temp/'.$temp_file->folder);
                    $temp_file->delete();
        }

    }
    function Afrin(Request $request){
        if($request->hasFile('image')){
            $image=$request->file('image');
        $file_name=$image->getClientOriginalExtension();
        $folder=uniqid('post',true);
        $image->storeAs('posts/temp/'.$folder.$file_name);
        TempFile::create([
            'folder'=>$folder,
            'filename'=>$file_name,
        ]);
        return $folder;

    }
    return '';
        }





}
