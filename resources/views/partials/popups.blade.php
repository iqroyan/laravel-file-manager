@php
    $path = isset($path) ? $path :NULL;
@endphp
<div class = "popups">
    <!-- Make Folder -->
    <div class="modal fade" id="newDirectory" tabindex="-1" role="dialog" aria-labelledby="newDirectoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header flex-row-reverse ">
                    <h5 class="modal-title" id="newDirectoryLabel">پوشه جدید</h5>
                    <button type="button" class="close float-left m-0 p-2"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action = "{{ route('fileManager.directory.store') }}" id="newDirectoryForm"  name = "popups-form" method = "post">
                        @csrf
                        <input type = "hidden" name = "path" value = "{{$path}}">
                        <div class="form-group ">
                            <label for="directoryName" class="col-form-label float-right">نام پوشه:</label>
                            <input type="text" name="name" required class="form-control" id="directoryName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    <button type="submit" class="btn btn-primary" onclick="__app.submit('newDirectoryForm')">ایجاد</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Make New file-->
    <div class="modal fade" id="newFile" tabindex="-1" role="dialog" aria-labelledby="newFileLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header flex-row-reverse ">
                    <h5 class="modal-title" id="newFileLabel">پوشه جدید</h5>
                    <button type="button" class="close float-left m-0 p-2"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action = "{{ route('fileManager.file.store') }}" id="newFileForm"  name = "popups-form" method = "post">
                        @csrf
                        <input type = "hidden" name = "path" value = "{{$path}}">
                        <div class="form-group ">
                            <label for="directoryName" class="col-form-label float-right">نام پوشه:</label>
                            <input type="text" name="name" required class="form-control" id="directoryName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    <button type="submit" class="btn btn-primary" onclick="__app.submit('newFileForm')">ایجاد</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Rename-->
    <div class="modal fade" id="rename" tabindex="-1" role="dialog" aria-labelledby="renameLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header flex-row-reverse ">
                    <h5 class="modal-title" id="renameLabel">پوشه جدید</h5>
                    <button type="button" class="close float-left m-0 p-2"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action = "{{ route('fileManager.rename') }}" id="renameForm"  name = "popups-form" method = "post">
                        @csrf
                        <input type = "hidden" name = "path" value = "{{$path}}">
                        <div class="form-group">
                            <label for="oldName">نام فعلی</label>
                            <input type="text" name="old_name" value="" id="oldName" disabled="disabled">
                        </div>
                        <div class="form-group ">
                            <label for="new_name" class="col-form-label float-right">نام جدید:</label>
                            <input type="text" name="new_name" required class="form-control" id="new_name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                    <button type="submit" class="btn btn-primary" onclick="__app.submit('renameForm')">ایجاد</button>
                </div>
            </div>
        </div>
    </div>

</div>


