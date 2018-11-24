<?php

# remove file and directory seprator
function base($array, $search)
{
    $arr = [];
    for ($i = 0; $i < count($array); $i++) {
        $arr[] = trim(str_after($array[$i], $search), '/');
    }

    return $arr;
}

# return information about files
function fileInfo($file, $path, $key = 'name')
{
    $root = config('filemanager.root');
    $path = $path == ' ' ? "{$root}/{$file}" : "{$root}/{$path}/{$file}";
//	return $path;
    $part = explode('.', $file);
    switch ($key) {
        case 'name':
            return str_limit($part[0], 15);
            break;
        case 'ext':
//            dump($part);
            return !empty($part[1]) ? strtolower(end($part)) : FALSE;
            break;
        case 'size':
            $size = Illuminate\Support\Facades\Storage::size($path);
            if ($size > 0) {
                $base = log($size) / log(1024);
                $suffix = [' Byte', ' KB', ' MB', ' GB', 'TB'];
                $f_base = floor($base);
                return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
            }
            return '0 Byte';
            break;
        case 'date':
            Carbon\Carbon::setLocale('fa');
            $modifiedDate = Carbon\Carbon::createFromTimestamp(Illuminate\Support\Facades\Storage::lastModified($path));
            return $modifiedDate->diffForHumans();
            break;
        case 'type':
//            Illuminate\Support\Facades\Storage::
            break;
    }

}

 # shortcut replace file
function rep($val, $search = '/', $replace = '\\')
{
    return str_replace($search, $replace, $val);
}

# add watermark to photo file format png,gif,jpg
function addWatermark($image)
{
    $dirSep = DIRECTORY_SEPARATOR;
    $root = storage_path("app{$dirSep}public");
    $img = $root . rep(str_after($image, 'storage'), '/', $dirSep);
    $sourceImg = imageCreateBy($img);
    $sourceImg_w = imagesx($sourceImg);
    $sourceImg_h = imagesy($sourceImg);
    Illuminate\Support\Facades\Storage::delete(rep($image, 'storage', 'public'));
    $watermark = imagecreatefrompng("{$root}{$dirSep}watermark.png");
    $watermark_w = imagesx($watermark);
    $watermark_h = imagesy($watermark);
    imagealphablending($watermark, FALSE);
    imagesavealpha($watermark, TRUE);
    $dst_x = ($sourceImg_w - $watermark_w) / 95;
    $dst_y = ($sourceImg_h - $watermark_h) - ($sourceImg_h - 190);
    imagecopy($sourceImg, $watermark, $dst_x, $dst_y, 0, 0, $watermark_w, $watermark_h);
    imageBy($sourceImg, $img);
    imagedestroy($sourceImg);
    imagedestroy($watermark);
    return TRUE;
}

# prepare image for add water mark
function imageCreateBy($img)
{
    $ext = last(explode('.', $img));
    switch ($ext) {
        case 'png':
            return imagecreatefrompng($img);
            break;
        case 'jpg':
        case 'jpeg':
            return imagecreatefromjpeg($img);
            break;
        case 'gif':
            return imagecreatefromgif($img);
            break;
        default :
            return true;
    }
}

# create new image by
function imageBy($sourceImg, $img)
{
    $ext = last(explode('.', $img));
    switch ($ext) {
        case 'png':
            return imagepng($sourceImg, $img, 9);
            break;
        case 'jpg':
        case 'jpeg':
            return imagejpeg($sourceImg, $img, 100);
            break;
        case 'gif':
            return imagegif($sourceImg, $img, 100);
            break;
        default :
            return true;
    }
}
# return file manager root folder
function root()
{
    return config('filemanager.root').'/';
}
# show alert flash message
function flash ($title = NULL, $message = NULL)
{
    $flash = app('Fani\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}
