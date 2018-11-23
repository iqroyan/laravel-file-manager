<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" href="{{ asset('/filemanager/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/filemanager/lib/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/filemanager/lib/fontawesome/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/filemanager/css/website.css') }}">
    <title>سیستم مدیریت فایل</title>
</head>
<body onload="">
<!-- WRAPPER -->
<section id="wrapper" class="container-fluid">

@includeIf('fileManager::partials.popup')
<!-- HEADER -->
    <header id="header" class="header">
        <div class="row">
            <nav class="navbar  justify-content-end col-md-12 col-sm-12 py-3">
                <a class="navbar-brand float-right" href="#">مدیریت فایل</a>
            </nav>
        </div>
        <div class="action-bar row justify-content-end py-2 px-4">
            <ul class=" list-inline m-0 d-flex ">
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">فایل</span>
                        <i class="fa fa-plus"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">پوشه</span>
                        <i class="fa fa-folder-plus"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">حذف</span>
                        <i class="fa fa-trash"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">انتقال</span>
                        <i class="fa fa-arrows-alt"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">آپلود</span>
                        <i class="fa fa-upload"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                        <span class="title">دانلود</span>
                        <i class="fa fa-download"></i>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <!-- ENDS HEADER -->
    <!-- MAIN -->
    <main id="main" class="main row ">
        <aside class="sidebar col-md-4 p-2">
            <form action="" class="form-inline embed-responsive">
                <div class="input-group mb-2 mr-sm-2 flex-row-reverse">
                    <div class="input-group-prepend">
                        <div class="input-group-text p-0">
                            <button type="submit" class="btn btn-file bg-transparent">
                                <i class="fa fa-home"></i>
                            </button>
                        </div>
                    </div>
                    <input type="text" name="root_path" class="form-control" id="inlineFormInputGroupUsername2"
                           placeholder="root">
                    <div class="input-group-prepend float-right">
                        <div class="input-group-text p-0">
                            <button type="submit" class="btn btn-file bg-transparent">
                                <i class="fa fa-arrow-left"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </aside>
        <section class="content col-md-8 p-2">
            <!-- content -->
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
                <tr>
                    <th scope="row">
                        <i class="fa fa-folder icon-folder"></i>
                        <span class="title">assets</span>
                    </th>
                    <td>20 kb</td>
                    <td>2018/02/14</td>
                    <td>file</td>
                    <td>
                        <ul class="list-inline m-0 p-0 meta-items">
                            <li class="list-inline-item"><a href="" class="icon-def">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item"><a href="" class="icon-def">
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
                <tr>
                    <th scope="row">
                        <i class="fa fa-file icon-file"></i>
                        <span class="title">file.png</span>
                    </th>
                    <td>20 kb</td>
                    <td>2018/02/14</td>
                    <td>file</td>
                    <td>
                        <ul class="list-inline m-0 p-0 meta-items">
                            <li class="list-inline-item"><a href="" class="icon-def">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item"><a href="" class="icon-def">
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
                <tr>
                    <th scope="row">alert.png</th>
                    <td>20 kb</td>
                    <td>2018/02/14</td>
                    <td>file</td>
                    <td class="opration-item">
                        <ul class="list-inline m-0 p-0 meta-items">
                            <li class="list-inline-item"><a href="" class="icon-def">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </li>
                            <span class="sep">-</span>
                            <li class="list-inline-item"><a href="" class="icon-def">
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
                </tbody>
            </table>


        {{--@yield('content')--}}
        <!-- ENDS content -->
        </section>
    </main>
    <!-- ENDS MAIN -->
    <!-- FOOTER -->
    <footer id="footer" class="footer row p-2 justify-content-center">
        <!-- Bottom -->
        <div class="topic">
            18th Iran WorldSkills Competition
            <span class="badge badge-info">seyed jaffar esmaily</span>
        </div>
        <!-- ENDS Bottom -->
    </footer>
    <!-- ENDS FOOTER -->
</section>
<!-- ENDS WRAPPER -->

<script type="text/javascript" src="{{ asset('filemanager/lib/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('filemanager/lib/sweetalert/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('filemanager/lib/fontawesome/all.js') }}"></script>
<script type="text/javascript" src="{{ asset('filemanager/js/website.jd') }}"></script>
</body>
</html>