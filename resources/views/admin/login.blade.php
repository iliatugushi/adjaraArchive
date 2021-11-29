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
    </style>
    @yield('css')

</head>

<body class="hold-transition login-page">


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-8">


                <div class="col-12" style="padding-top:150px;">
                    <h3 class="caps text-center"><b>ადმინისტრატორი</b></h3>
                    <div class="card col-12">
                        <div class="card-body login-card-body ">

                            @include('partials.error')
                            @include('partials.success')



                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">ელფოსტა</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">პაროლი</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block">შესვლა</button>
                                    </div>
                                </div>
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
