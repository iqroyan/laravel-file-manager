@extends('layouts.app')

@section('content')
    <div id = "page-title">
        <span class = "title">مشاهده تصویر - <a href = "{{ route('file.index') }}"> » بازگشت </a></span>
        <div style = "text-align: right; margin-top: 10px;">
        </div>
    </div>
    <div class = "imgeviewer">
        <form action = "{{ route('file.addWaterMark') }}" method = "post" target = "_self">
            @csrf
            @if(session()->has('message'))
                <div class="alert text-center  alert-success">{{ session('message') }}</div>
            @endif
            <input type = "hidden" name = "file" value="{{ $file }}">
            <img src = "{{ $file }}" class = "imageviewer"/>
            <div class = "viewfooter">
                <input type = "submit" name = "addwatermark" class = "button2" value = "افزودن واترمارک"/>
            </div>
        </form>
    </div>
@stop