<?php

namespace Esmaily\FileManager\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileController
 * @package Esmaily\FileManager\Controllers
 */
class FileController extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $path = ' ';
        $route = config('filemanager.root');
        if ($request->has('directory')) {
            $path = $request->input('directory');
            $route = config('filemanager.root') . '/' . $request->input('directory');
        }
        $directories = base(Storage::directories($route), $route);
//        return $directories;
        $files = base(Storage::files($route), $route);

        return view('fileManager::file.index', ['directories' => $directories, 'files' => $files, 'path' => $path]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);
        $path = $request->input('path');
        $path = $path == NULL ? root() . $request->name : root() . $path . '/' . $request->name;
        Storage::put($path, '');
        flash();
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rename(Request $request)
    {
        $path = $request->path;
        $path = $path == NULL ? root() : root() . $path . '/';
        $oldName = $path . $request->input('old_name');
        $newName = $path . $request->input('new_name');
        //
        Storage::move($oldName, $newName);

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function move(Request $request)
    {
        $path = $request->path;
        $path = $path == NULL ? root() : root() . $path . '/';
        $oldPath = $path . $request->input('old_path');
        $filename = last(explode('/', $oldPath));
        $newPath = root() . $request->input('new_path') . '/' . $filename;

        Storage::move($oldPath, $newPath);

        return back();
    }

    /**
     * @param $name
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($name, $path = '')
    {
        $file = rep($this->root, 'public', '/storage') . trim(rep($path, '\\', '/'), ' ') . '/' . $name;

        return view('file.show', ['file' => $file]);
    }

    /**
     * @param $name
     * @param string $path
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($name, $path = '')
    {
        $file = $this->root . trim(rep($path, '\\', '/'), ' ') . '/' . $name;
        $content = Storage::get($file);

        return view('file.edit', ['content' => $content, 'file' => $file]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $file = $request->file;
        Storage::put($file, $request->input('description'));

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addWatermark(Request $request)
    {

        $file = $request->input('file');
        //		return addWatermark($file);
        if (addWatermark($file)) {
            session()->flash('message', ' واتر مارک اضافه شد');
        }

        return back();
    }

    /**
     * @param Request $request
     * @return string
     */
    public function download(Request $request)
    {
        $path = $this->root . $request->input('path');
        $files = explode(',', $request->input('files'));

        if (count($files) == 1) {
            $file = $path . '/' . $files[0];

            return Storage::download($file);
        } else {
            $name = "storage/downloads/" . time() . '-' . count($files) . "-file.zip";
            $zip = new \ZipArchive();
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

    /**
     * @param Request $request
     * @param $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $file)
    {
        $path = $request->input('path');
        $path = $path == NULL ? root() . $file : root() . "{$path}/{$file}";
        Storage::delete($path);
        flash()->success('عملیات موفق !','فایل با موفقیت ایجاد شد');
        return back();
    }

}
