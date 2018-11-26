@extends('fileManager::layouts')
@section('content')
            @if(empty($directories) && empty($files))
                <div class="alert alert-warning text-center">This Directory Is Empty</div>
                @else

            <table class="table  table-hover  file-items">
                <thead class="thead-light">
                <tr>
                    <th scope="col">نام</th>
                    <th scope="col">سایز</th>
                    <th scope="col">آخرین ویرایش</th>
                    <th scope="col">نوع</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($directories as $directory)
                <tr  ondblclick="__app.browse('{{$directory}}')">
                    <td>
                        <i class="fa fa-folder icon-folder"></i>
                        <span class="title">{{ $directory }}</span>
                    </td>
                    <td>{{ fileInfo($directory,$path,'size') }}</td>
                    <td>{{ fileInfo($directory,$path,'date') }}</td>
                    <td>directory</td>
                    <td class="p-0 pt-2">
                        <ul class="list-inline m-0 p-0  meta-items">
                            <li class="list-inline-item">
                                <form method="post" action="{{ route('fileManager.directory.destroy',$directory) }}" class="form-inline m-0 delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="path" value="{{ $path }}">
                                    <button type="button" onclick="__app.dangerMode(this)" class="bg-transparent border-0 p-0" >
                                        <i class="fa fa-trash icon-def"></i>
                                    </button>
                                </form>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item">
                                <button type="button" onclick="__app.updateInput('{{ $directory }}','#oldPath')"  data-toggle="modal" data-target="#move" class="bg-transparent border-0 p-0" >
                                    <i class="fa fa-arrows-alt icon-def"></i>
                                </button>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item">
                                    <button type="button" onclick="__app.updateInput('{{ $directory }}','#oldName')"  data-toggle="modal" data-target="#rename" class="bg-transparent border-0 p-0" >
                                      تغییر نام
                                    </button>

                            </li>
                        </ul>
                    </td>
                </tr>
                    @endforeach
                @foreach($files as $file)
                    @php
                        $ext= fileInfo($file,$path,'ext');
                        $isView=['jpg','jpeg','png','gif'];
                    @endphp
                    <tr>
                        <th scope="row">
                            <i class="fa fa-file icon-file"></i>
                            <span class="title">{{ $file }}</span>
                        </th>
                        <td>{{ fileInfo($file,$path,'size') }} </td>
                        <td>{{ fileInfo($file,$path,'date') }} </td>
                        <td>text</td>
                        <td>
                            <ul class="list-inline m-0 p-0 meta-items">
                                <li class="list-inline-item">
                                    <form method="post" action="{{ route('fileManager.file.destroy',$file) }}" class="form-inline m-0 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="__app.dangerMode(this)" class="bg-transparent border-0 p-0" >
                                            <i class="fa fa-trash icon-def"></i>
                                        </button>
                                    </form>
                                </li>
                                <span class="sep">-</span>
                                <li class="list-inline-item"><a href="{{ route('fileManager.show',[$file,rep($path)]) }}" class="icon-def">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <span class="sep">-</span>
                                <li class="list-inline-item"><a href="{{ route('fileManager.edit',[$file,rep($path)]) }}" class="icon-def">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </li>


                                <span class="sep">-</span>
                                <li class="list-inline-item">
                                    <button type="button" onclick="__app.updateInput('{{ $file }}','#oldPath')"  data-toggle="modal" data-target="#move" class="bg-transparent border-0 p-0" >
                                        <i class="fa fa-arrows-alt icon-def"></i>
                                    </button>
                                </li>
                                <span class="sep">-</span>
                                <li class="list-inline-item">
                                    <button type="button" onclick="__app.updateInput('{{ $file }}','#oldName')"  data-toggle="modal" data-target="#rename" class="bg-transparent border-0 p-0" >
                                        تغییر نام
                                    </button>

                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
@stop