<?php

namespace  Esmaily\FileManager\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    //

    public function store(Request $request)
    {
        $path = $request->input('path');
        $path = $path==NULL ? $this->root . $request->name : $this->root . $path .'/'.$request->name;
        Storage::makeDirectory($path);
        return back();
    }
    public function destroy (Request $request)
    {
        $path=$request->input('path');
        $file =$request->input('file');
        $path = $path ==NULL ? $this->root . $file : $this->root ."{$path}/{$file}";
        Storage::deleteDirectory($path);
        return back();
    }
}
