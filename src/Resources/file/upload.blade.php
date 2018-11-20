@extends('layouts.app')

@section('content')
    <div id = "page-title">
        <span class = "title">آپلود فایل - <a href = "{{ route('file.index') }}"> » بازگشت </a></span>
        <div style = "text-align: right; margin-top: 10px;">
        </div>
    </div>
    <div class = "imgeviewer">
        <form action = "{{ route('upload') }}" method = "post" target = "_self" enctype = "multipart/form-data">
            @csrf
            @if($errors->has('file'))
                <div class="alert  text-center alert-danger">{{ $errors->first('file') }}</div>
            @endif
            @if(session()->has('message'))
                <div class="alert text-center  alert-success">{{ session('message') }}</div>
            @endif
            <div class = "viewfooter">
                <div>
                    <input type = "file" name = "file"/>
                    <input type = "checkbox" name = "watermark"/> - افزودن واترمارک
                </div>
                <input type = "submit" name = "addwatermark" class = "button2" value = "آپلود فایل"/>
            </div>
        </form>
    </div>
@stop