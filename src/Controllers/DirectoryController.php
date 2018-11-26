<?php

namespace Esmaily\FileManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectoryController extends Controller
{
    //
    public function store(Request $request)
    {
        $path = $request->input('path');
        $path = $path == NULL ? root() . $request->name : root() . $path . '/' . $request->name;
        Storage::makeDirectory($path);
        flash()->success('عملیات  موفق !','پوشه با موفقیت ایجاد شد');
        return back();
    }
    public function destroy(Request $request, $file)
    {
        $path = $request->input('path');
        $path = $path == NULL ? root() . $file : root() . "{$path}/{$file}";
        Storage::deleteDirectory($path);
        flash()->success('عملیات  موفق !','پوشه با موفقیت حذف شد');
        return back();
    }
}
