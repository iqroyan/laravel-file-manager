<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

function base ($array, $search)
{
    $arr = [];
    for ($i = 0; $i < count($array); $i++) {
        $arr[] = trim(str_after($array[$i], $search),'/');
    }

    return $arr;
}

function fileInfo($file,$path,$key='name')
{
    $path = $path ==' ' ? "public/myfiles/{$file}" : "public/myfiles/{$path}/{$file}";
//	return $path;
    $part = explode('.',$file);
    switch ($key)
    {
        case 'name':
            return str_limit($part[0],15);
            break;
        case 'ext':
            return !empty($part[1]) ?  strtolower(end($part)):FALSE;
            break;
        case 'size':
            $size = Storage::size($path) ;
            if($size>0){
                $base = log($size) / log(1024);
                $suffix = [' Byte',' KB', ' MB',' GB','TB'];
                $f_base = floor($base);
                return round(pow(1024,$base - floor($base)),1) . $suffix[$f_base];
            }
            return '0 Byte';
            break;
        case 'date':
            return Carbon::createFromTimestamp(Storage::lastModified($path))->toFormattedDateString();
            break;

    }

}

function rep($val,$search='/',$replace='\\')
{
    return str_replace($search,$replace,$val);
}

function addWatermark($image)
{
    $dirSep = DIRECTORY_SEPARATOR;
    $root = storage_path("app{$dirSep}public");
    $img = $root . rep(str_after($image,'storage'),'/',$dirSep);
    $sourceImg = imageCreateBy($img);
    $sourceImg_w= imagesx($sourceImg);
    $sourceImg_h= imagesy($sourceImg);
    Storage::delete(rep($image,'storage','public'));
    $watermark = imagecreatefrompng("{$root}{$dirSep}watermark.png");
    $watermark_w = imagesx($watermark);
    $watermark_h = imagesy($watermark);
    imagealphablending($watermark,FALSE);
    imagesavealpha($watermark,TRUE);
    $dst_x = ($sourceImg_w - $watermark_w) /95;
    $dst_y =  ($sourceImg_h - $watermark_h) -($sourceImg_h -190);
    imagecopy($sourceImg,$watermark,$dst_x,$dst_y,0,0,$watermark_w,$watermark_h);
    imageBy($sourceImg,$img);
    imagedestroy($sourceImg);
    imagedestroy($watermark);
    return TRUE;
}
function imageCreateBy($img){
    $ext = last(explode('.',$img));
    switch ($ext)
    {
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
function imageBy($sourceImg,$img){
    $ext = last(explode('.',$img));
    switch ($ext)
    {
        case 'png':
            return imagepng($sourceImg,$img,9);
            break;
        case 'jpg':
        case 'jpeg':
            return imagejpeg($sourceImg,$img,100);
            break;
        case 'gif':
            return imagegif($sourceImg,$img,100);
            break;
        default :
            return true;
    }
}