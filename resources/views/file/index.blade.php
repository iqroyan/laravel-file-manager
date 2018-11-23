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
                <tr ondblclick="__app.browse('{{$directory}}')">
                    <th scope="row">
                        <i class="fa fa-folder icon-folder"></i>
                        <span class="title">{{ $directory }}</span>
                    </th>
                    <td>{{ fileInfo($directory,$path,'size') }}</td>
                    <td>{{ fileInfo($directory,$path,'date') }}</td>
                    <td>directory</td>
                    <td>
                        <ul class="list-inline m-0 p-0 meta-items">
                            <li class="list-inline-item"><a href="" class="icon-def" title="حذف" data-toggle="tooltip">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item"><a href="" class="icon-def">
                                    <i class="fa fa-arrows-alt"></i>
                                </a>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item"><a href="" class="icon-def">
                                    <i class="fa fa-edi"></i>
                                </a>
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
                                <li class="list-inline-item"><a href="" class="icon-def">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                                <span class="sep">-</span>
                                <li class="list-inline-item"><a href="" class="icon-def">
                                        <i class="fa fa-arrows-alt"></i>
                                    </a>
                                </li>
                                <span class="sep">-</span>
                                <li class="list-inline-item"><a href="" class="icon-def">
                                        <i class="fa fa-edi"></i>
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
@stop