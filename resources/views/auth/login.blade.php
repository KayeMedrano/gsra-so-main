@extends('layouts.app')

@section('content')



<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">


<body style="background-color: cornsilk">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="/img/cover.png"/>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Log In!</h1>
                                </div>

                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="user" >

                                @csrf

                                    <div class="form-group">

                                        <input id="email" type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ old('email') }}" required autofocus
                                             aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">

                                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                    </div>
                                    <div class="form-group">
                                        <input id="password"  type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                                            placeholder="Password">

                                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">

                                            <input type="checkbox" class="custom-control-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label"  for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                     </button>

                                </form>
                                <hr>
                                
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create New Account</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

@endsection