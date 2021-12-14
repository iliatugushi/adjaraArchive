<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>შესვლა</title>
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
            <div class="col col-lg-5">


                <div class="col-12" style="padding-top:150px;">
                    <div class="card col-12">
                        <div class="card-body login-card-body ">

                            @include('partials.error')
                            @include('partials.success')

                            <img src="{{ asset('images/logo_view.jpg') }}"
                                style="width:300px;display: block; margin-left: auto; margin-right: auto;"
                                class="pt-3 pb-3 " />
                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="ელფოსტა">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="პაროლი">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block caps">შესვლა</button>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
