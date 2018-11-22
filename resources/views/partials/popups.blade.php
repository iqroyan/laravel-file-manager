@php
    $path = isset($path) ? $path :NULL;
@endphp

<div class = "popups hidden">

    <!-- Make Folder -->
    <div class = "popup-box" id = "makeDir">
        <div class = "head">
            <p class = "box-title"> ایجاد پوشه جدید</p>
        </div>
        <div class = "content">
            <form action = "{{ route('directory.store') }}" name = "popups-form" method = "post">
                @csrf
                <input type = "hidden" name = "path" value = "{{$path}}">
                <div class = "form-group title-row">
                    <p class = "box-title">لطفا نام پوشه خود را وارد کنید? </p>
                </div>
                <div class = "form-group">
                    <input required type = "text" name = "name" class = "form-control" autofocus placeholder = "name">
                </div>
                <div class = "form-group btn-row">
                    <input type = "submit" value = "ایجاد" class = "btn btn-success">
                    <input type = "button" value = "لغو" class = "btn btn-danger" onclick = "__app.close()">
                </div>
            </form>
        </div>
    </div>
    <!-- Make file -->
    <div class = "popup-box" id = "makeFile">
        <div class = "head">
            <p class = "box-title"> ایجاد فایل جدید</p>
        </div>
        <div class = "content">
            <form action = "{{ route('file.store') }}" name = "popups-form" method = "post">
                @csrf
                <input type = "hidden" name = "path" value = "{{$path}}">
                <div class = "form-group title-row">
                    <p class = "box-title">لطفا نام فایل خود را وارد کنید? </p>
                </div>
                <div class = "form-group">
                    <input required type = "text" name = "name" class = "form-control" autofocus placeholder = "name">
                </div>
                <div class = "form-group btn-row">
                    <input type = "submit" value = "ایجاد" class = "btn btn-success">
                    <input type = "button" value = "لغو" class = "btn btn-danger" onclick = "__app.close()">
                </div>
            </form>
        </div>
    </div>
    <!-- Rename file -->
    <div class = "popup-box" id = "rename">
        <div class = "head">
            <p class = "box-title">ویرایش نام</p>
        </div>
        <div class = "content">
            <form action = "{{ route('rename') }}" name = "popups-form" method = "post">
                @csrf
                <input type = "hidden" name = "path" value = "{{$path}}">
                <input type = "hidden" name = "old_name" value = "" id="old_name">
                <div class = "form-group title-row">
                    <p class = "box-title">نام فعلی فایل:</p>
                    <p class="old"></p>
                </div>
                <div class = "form-group">
                    <input required type = "text" id="renameinput" name = "name" class = "form-control" autofocus placeholder = "name">
                </div>
                <div class = "form-group btn-row">
                    <input type = "submit" value = "تغییر" class = "btn btn-success">
                    <input type = "button" value = "لغو" class = "btn btn-danger" onclick = "__app.close()">
                </div>
            </form>
        </div>
    </div>
    <!-- Move file -->
    <div class = "popup-box" id = "move">
        <div class = "head">
            <p class = "box-title">انتقال</p>
        </div>
        <div class = "content">
            <form action = "{{ route('move') }}" name = "popups-form" method = "post">
                @csrf
                <input type = "hidden" name = "path" value = "{{$path}}">
                <input type = "hidden" name = "old_path" value = "" id="old_path">
                <div class = "form-group title-row">
                    <p class = "box-title">مسیر فعلی :</p>
                    <p class="old"></p>
                </div>
                <div class = "form-group">
                    <input required type = "text" name = "name" class = "form-control" autofocus placeholder = "name">
                </div>
                <div class = "form-group btn-row">
                    <input type = "submit" value = "انتقال" class = "btn btn-success">
                    <input type = "button" value = "لغو" class = "btn btn-danger" onclick = "__app.close()">
                </div>
            </form>
        </div>
    </div>
</div>


