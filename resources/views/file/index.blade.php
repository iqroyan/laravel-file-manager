@extends('fileManager::layouts')
@section('content')
    <!-- title -->
    <div id = "page-title">
        <span class = "title">مدیریت فایل</span>
        <div style = "text-align: right; margin-top: 10px;">
        </div>
    </div>
    <!-- ENDS title -->
    <form name = "BrowseForm" id = "BrowseForm" action = "{{ route('fileManager.index') }}" method = "get">
        @csrf
        <table id = "toptable">
            <tbody>
            <tr valign = "bottom">
                <td rowspan = "2" width = "40">&nbsp;</td>
                <td style = "text-align: left;">
                    <input type = "text" name = "directory" id="directory" placeholder = "/public_html" value = "{{ $path }}"
                           style = "width: 400px;direction: ltr;text-align: left" title = "(accesskey g)" accesskey = "g">
                    <a href = "javascript:createDirectoryTreeWindow('/public_html','BrowseForm.directory');"
                       title = "List">

                    </a>
                    <button type="submit" style="outline: 0;margin: 0;padding: 0;">
                        <img src = "files/view_tree.png" alt = "List"
                             onmouseover = "this.style.margin=&#39;0px&#39;;this.style.width=&#39;34px&#39;;this.style.height=&#39;34px&#39;;"
                             onmouseout = "this.style.margin=&#39;1px&#39;;this.style.width=&#39;32px&#39;;this.style.height=&#39;32px&#39;;"
                             style = "border: 0px; margin: 1px; width: 32px; height: 32px; vertical-align: middle;">
                    </button>
                    <br>
                    <span style = "font-size: 80%;"> <a
                                href = "{{ route('fileManager.index') }}">شاخه اصلی</a> /public_html</span>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <table id = "maintable" style = "width: 925px;">
            <tbody>
            <tr class = "browse_rows_actions">
                <td colspan = "6">
                    <table style = "width: 925px;">
                        <tbody>
                        <tr>
                            <td valign = "top" style = "text-align: left;">
                                <input onclick="__app.MakeDirectory()" type = "button" id = "smallbutton" value = "پوشه جدید"
                                       title = "Make a new subdirectory in directory /public_html (accesskey w)"
                                       accesskey = "w">
                                <input onclick="__app.MakeFile()" type = "button" id = "smallbutton" value = "فایل جدید"
                                       title = "Create a new file in directory /public_html (accesskey y)"
                                       accesskey = "y">
                                <input onclick="window.location.href='upload'" type = "button" id = "smallbutton" value = "آپلود"
                                       title = "Upload new files in directory /public_html (accesskey u)"
                                       accesskey = "u">
                                <input type = "button" id = "smallbutton" value = "انتقال"
                                       title = "Move the selected entries (accesskey m)" accesskey = "m">
                                <input type = "button" id = "smallbutton" value = "حذف"
                                       title = "Delete the selected entries (accesskey d)" accesskey = "d">

                            </td>
                            <td valign = "top" style = "text-align: right;">


                                <div style = "margin-top: 3px;">
                                    <input onclick="__app.Download()" type = "button" id = "smallbutton" value = "دانلود"
                                           title = "Download a zip file containing all selected entries (accesskey x)"
                                           accesskey = "x">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
        </table>
        <ul id = "items">
            @if(empty($directories) && empty($files))
                <p style = "text-align: center;font-size: 18px;">This Directory Is Empty</p>
            @endif
            @foreach($files as $file)

                <li class="item-file">
                    @php
                        $ext= fileInfo($file,$path,'ext');
                        $isView=['jpg','jpeg','png','gif'];
                    @endphp
                    <div class = "item-title">
                        <input name="file" value="{{ $file }}" type = "checkbox"/> {{ fileInfo($file,$path,'name') }}
                    </div>
                    <div class = "item-prob">
                        {{ $file }} , {{ fileInfo($file,$path,'size') }} , Last Modify : {{ fileInfo($file,$path,'date') }}
                    </div>
                    <div class = "items-meta">
                        <a href = "javascript:__app.DeleteFile('{{ $file }}')">حذف</a> -
                        <a href = "{{ $ext=='txt' ? route('fileManager.edit',[$file,rep($path)]) : '#' }}">ویرایش</a> -
                        <a href = "{{ in_array($ext,$isView) ? route('fileManager.show',[$file,rep($path)]) : '#' }}">نمایش</a> -
                        <a href = "javascript:__app.Move('{{ $file }}')">انتقال</a> -
                        <a href = "javascript:__app.Rename('{{ $file }}')">تغییر نام</a>
                    </div>
                </li>
            @endforeach
                @foreach($directories as $directory)
            <li ondblclick="__app.browse('{{ $directory }}')" class="item-directory">

                <div class = "item-title">
                    <input name="dir" type = "checkbox"/> <img src = "files/folder.png"/>{{ $directory }}
                </div>
                <div class = "items-meta">
                    <a href = "javascript:__app.DeleteDirectory('{{ $directory }}')">حذف</a> -
                    <a href = "javascript:__app.Move('{{ $directory }}')">انتقال</a> -
                    <a href = "javascript:__app.Rename('{{ $directory }}')">تغییر نام</a>
                </div>
            </li>
        @endforeach
        </ul>
    </form>
@stop