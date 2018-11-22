<?php

namespace Esmaily\FileManager\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function index (Request $request)
    {
        $path = ' ';

        $route = config('filemanager.root');
        if ($request->has('directory')) {
            $path  = $request->input('directory');
            $route = $this->root . $request->input('directory');
        }
        $directories = base(Storage::directories($route), $route);
        $files       = base(Storage::files($route), $route);

        return view('fileManager::file.index', ['directories' => $directories, 'files' => $files, 'path' => $path]);
    }

    public function store (Request $request)
    {
        $path = $request->input('path');
        $path = $path == NULL ? $this->root . $request->name : $this->root . $path . '/' . $request->name;
        Storage::put($path, '');

        return back();
    }

    public function rename (Request $request)
    {
        $path    = $request->path;
        $path    = $path == NULL ? $this->root : $this->root . $path . '/';
        $oldName = $path . $request->input('oldname');
        $newName = $path . $request->input('newname');
        //
        Storage::move($oldName, $newName);

        return back();
    }

    public function move (Request $request)
    {
        $path     = $request->path;
        $path     = $path == NULL ? $this->root : $this->root . $path . '/';
        $oldPath  = $path . $request->input('oldpath');
        $filename = last(explode('/', $oldPath));
        $newPath  = $this->root . $request->input('newpath') . '/' . $filename;

        Storage::move($oldPath, $newPath);

        return back();
    }

    public function show ($name, $path = '')
    {
        $file = rep($this->root, 'public', '/storage') . trim(rep($path, '\\', '/'), ' ') . '/' . $name;

        return view('file.show', ['file' => $file]);
    }

    public function edit ($name, $path = '')
    {
        $file    = $this->root . trim(rep($path, '\\', '/'), ' ') . '/' . $name;
        $content = Storage::get($file);

        return view('file.edit', ['content' => $content, 'file' => $file]);
    }

    public function update (Request $request)
    {
        $file = $request->file;
        Storage::put($file, $request->input('description'));

        return back();
    }

    public function upload (Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:png,gif,jpg,jpeg|max:2048',
        ]);
        $name = $request->file('file')->getClientOriginalName();
        $path = 'storage/myfiles/' . $name;
        if ($request->file('file')->storeAs($this->root, $name)) {
            if ($request->has('watermark')) {
                addWatermark($path);
            }
            session()->flash('message', 'فایل با موفقیت آپلود شد');
        }

        return back();
    }

    public function addWatermark (Request $request)
    {

        $file = $request->input('file');
        //		return addWatermark($file);
        if (addWatermark($file)) {
            session()->flash('message', ' واتر مارک اضافه شد');
        }

        return back();
    }

    public function download (Request $request)
    {
        $path  = $this->root . $request->input('path');
        $files = explode(',', $request->input('files'));

        if (count($files) == 1) {
            $file = $path . '/' . $files[0];

            return Storage::download($file);
        } else {
            $name = "storage/downloads/" . time() . '-' . count($files) . "-file.zip";
            $zip  = new \ZipArchive();
            $zip->open($name, \ZipArchive::CREATE);
            if ($zip->open($name, \ZipArchive::CREATE) !== TRUE) {
                return 'zip create error';
            }
            for ($i = 0; $i < count($files); $i++) {
                $filename = last(explode('/', $files[$i]));
                $zip->addFile('storage/myfiles/' . $files[$i], $filename);
            }
            $zip->close();

            return Storage::download(rep($name, 'storage', 'public'));
        }


    }

    public function destroy (Request $request)
    {
        $path = $request->input('path');
        $file = $request->input('file');
        $path = $path == NULL ? $this->root . $file : $this->root . "{$path}/{$file}";
        Storage::delete($path);

        return back();
    }
}
