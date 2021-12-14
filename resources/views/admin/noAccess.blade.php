<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>თქვენ არ გაქვთ წვდომა</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}} ">
    <style>
        html,
        body,
        samp {
            font-family: 'FiraGO';
        }

        .bg_pic::before {
            content: "";
            background-image: url('images/pic_40.jpg');
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.15;
        }
    </style>
    @yield('css')

</head>

<body class="hold-transition login-page bg_pic">


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-7">


                <div class="col-12" style="padding-top:150px;">
                    <div class="card col-12">
                        <div class="card-body login-card-body text-center">
                            <h4>თქვენ არ გაქვთ წვდომა შესაბამის სერვისზე. გიხდით ბოდიშს.</h4>
                            <a href="{{ route('admin.dashboard') }}" class="caps">უკან დაბრუნება</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
