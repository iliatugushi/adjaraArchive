<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('favicon.ico')}}" rel="icon">
    <title>აჭარის არქივი</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}} ">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap4.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <style>
        table tbody tr th {
            font-weight: 300 !important;
        }

        table {
            border-bottom: solid 1px #f8f8f9;
            border-left: solid 1px #f8f8f9;
            border-right: solid 1px #f8f8f9;
            border-top: none;
        }

        table thead {
            background-color: #f8f8f9;
            border: none !important;
        }

        table tbody {
            border: none !important;
        }

        tfoot {
            display: table-header-group;
        }

        .showTitle {
            font-size: 13px !important;
        }

        .showValue {
            font-size: 13px;
        }

        .sectionTitle {
            font-size: 16px;
        }

        #tree ul {
            list-style-type: none;
            padding: 0px;
        }

        #tree li {
            margin-left: 0px;
            font-size: 14px !important;
            cursor: pointer;
        }

        #tree li ul {
            padding-left: 20px;
        }

        #tree li span {
            padding-top: 10px;
            display: block;
        }

        #tree li i {
            padding-left: 5px;
            padding-right: 5px;
        }

        .caret {
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .caret::before {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f054";
            color: black;
            display: inline-block;
            margin-right: 2px;
            font-size: 10px;
        }

        .caret-down::before {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f078";

            color: black;
            display: inline-block;
            margin-right: 2px;
            font-size: 10px;
        }

        .nested {
            display: none;
        }

        .active {
            display: block;
        }

        .navbar-brand {
            padding: 0px !important;
        }

        .navbar-brand img {
            float: left;
            margin-left: 10px !important;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .navbar-brand span {
            float: left;
            font-size: 40px;
            padding: 0px !important;
            margin: 0px !important;

        }

        .brand-image {}

        .nav-link {
            font-size: 14px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #bd8700;
            border-color: #bd8700;
        }

        .btn-primary:focus,
        .btn-primary:hover {
            background-color: #e0a306;
            border-color: #e0a306;
        }

        .topBar {
            height: 200px;
            background-image: url("{{ asset('images/topPic.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .bootstrap-select {
            max-width: 200px;
        }

        .bootstrap-select .btn {
            width: 150px;
            font-size: 10px;
        }

        .bootstrap-select .dropdown-menu {
            max-width: 1000px;
            font-size: 12px;
        }

        select::-ms-expand {
            /* for IE 11 */
            display: none;
        }
    </style>
    @yield('css')

    @FilemanagerScript
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <div class="topBar d-none d-lg-block"> </div>
        <nav class="main-header navbar navbar-expand-md navbar-dark  navbar-primary"
            style="background-color:#bd8700;padding:0px !important;margin:0px !important;">
            <div class="container-fluid">
                <a href="{{route('admin.dashboard')}}" class="navbar-brand">
                    <img src="{{ asset('images/logo_view_header.png') }}" title="საარქივო საინფორმაციო სისტემა"
                        style="height:60px;">
                    <span class="brand-text caps">AIS</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav caps" style="font-size:13px;padding-top:5px;">
                        <li class="nav-item ">
                            <a href="{{route('admin.dashboard')}}" class="nav-link dashboardL">
                                <p> მთავარი </p>
                            </a>
                        </li>



                        @if(auth()->guard('admin')->user()->can('view_archives'))
                        <li class="nav-item ">
                            <a href="{{route('archives.index')}}" class="nav-link archivesL">
                                <p> არქივები </p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->guard('admin')->user()->can('view_creators'))
                        <li class="nav-item ">
                            <a href="{{route('creators.index')}}" class="nav-link creatorsDropdowmL">
                                <p> ფონდშემქმნელთა სია </p>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->can('view_fonds'))
                        <li class="nav-item ">
                            <a href="{{route('fonds.index')}}" class="nav-link objectsL">
                                <p> საარქივო ობიექტები </p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->guard('admin')->user()->can('view_admins'))
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="nav-link dropdown-toggle rolesL administrationL">
                                ადმინისტრირება
                            </a>
                            <ul aria-labelledby="administrationL" class="dropdown-menu border-0 shadow "
                                style="font-size:13px;">
                                @if(auth()->guard('admin')->user()->can('view_admins'))
                                <li>
                                    <a href="{{ route('admins.index') }}" class="dropdown-item">
                                        ადმინისტრატორები
                                    </a>
                                </li>
                                @endif
                                @if(auth()->guard('admin')->user()->can('create_roles'))
                                <li>
                                    <a href="{{route('roles.index')}}" class="dropdown-item">
                                        როლები
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        <li class="nav-item ">
                            <a href="{{asset('Instruction.pdf')}}" target="_blank" class="nav-link instructionL">
                                <p> ინსტრუქცია </p>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('logout') }}" title="გამოსვლა">
                            <span style="padding-right:5px;" class="caps">
                                {{Auth::guard('admin')->user()->name}}
                            </span>
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container-fluid">
                    @include('partials.error')
                    @include('partials.success')
                    @yield('content')
                </div>
            </div>
        </div>



        <footer class="main-footer">
            <strong>Developed BY <a href="http://gtntech.com/">GTNTECH</a>.</strong> All rights
            reserved.
        </footer>


    </div>




    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>

    <script src="{{asset('js/additional.js')}}"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            initialization();
            $('.editor').css('height', '800px');
        });
        $(document).ready(function () {
            $('.dataTables_filter input[type="search"]').attr('placeholder','საძიებო სიტყვა ....').css({'width':'350px','display':'inline-block'});
        });
        function initialization() {

           var table = $('.tableData').DataTable({
            "aaSorting": [
            [0, 'asc']
            ],
            dom: 'lBfrtip',
            lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 ', '25 ', '50 ', 'ყველა' ]
            ],

            colReorder: true,
            // buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
            buttons: [{
            extend: 'excel',
            title: 'Export',
            text: "ექსელში დაექსპორტება",
            exportOptions: {
            columns: ':visible'
            }
            }, {
            extend: 'colvis',
            text: "სვეტების დამალვა",

            }
            ],


                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="filterSel" style="width:30px;"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            var editor_config = {
                path_absolute: "/",

                selector: '.editor',
                height: "500",
                relative_urls: false,
                image_advtab: true,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern textcolor imagetools "
                ],
                fontsize_formats: "8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 24pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
                toolbar: "insertfile undo redo | styleselect | bold italic | fontsizeselect  |forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                file_picker_callback: function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }
                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            };
            tinymce.init(editor_config);
            $('.datePicker').datepicker({
              format: 'yyyy-mm-dd'
            });
            $('select').attr('data-live-search', 'true');
            $('select').not('.connectionElement').selectpicker();
        }


    </script>

    @yield('js')
</body>

</html>
