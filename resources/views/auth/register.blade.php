@extends('layouts.app')

@section('content')



    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <body style="background-color: cornsilk">

    <div class="container">

    <div class="row justify-content-center">
         <div class="col-xl-15 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="/img/cover.png" style="width:650px;height:550px;border:transparent"/>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="StoreName" class="col-md-4 col-form-label text-md-right">{{ __('Store Name') }}</label>

                            <div class="col-md-8">
                                <input id="StoreName" type="text" class="form-control{{ $errors->has('StoreName') ? ' is-invalid' : '' }}" name="StoreName" value="{{ old('StoreName') }}" required autofocus>

                                @if ($errors->has('StoreName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('StoreName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label  for="StoreOwner" class="col-md-4 col-form-label text-md-right">Store Owner</label>
                        <div class="col-md-8">
                        <input id="StoreOwner" type="text" placeholder="John Doe" class="form-control{{ $errors->has('StoreOwner') ? ' is-invalid' : '' }}" name="StoreOwner" value="{{ old('StoreOwner') }}" required autofocus>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label  for="StoreAddress" class="col-md-4 col-form-label text-md-right">Store Address</label>
                        <div class="col-md-8">
                        <select class="form-control{{ $errors->has('StoreAddress') ? ' is-invalid' : '' }}" name="StoreAddress" value="{{ old('StoreAddress') }}" required autofocus >
                        <option value="Brgy. 1 Nasugbu, Batangas">Brgy. 1 Nasugbu, Batangas</option>
                        <option value="Brgy. 2 Nasugbu, Batangas">Brgy. 2 Nasugbu, Batangas</option>
                        <option value="Brgy. 3 Nasugbu, Batangas">Brgy. 3 Nasugbu, Batangas</option>
                        <option value="Brgy. 4 Nasugbu, Batangas">Brgy. 4 Nasugbu, Batangas</option>
                        <option value="Brgy. 5 Nasugbu, Batangas">Brgy. 5 Nasugbu, Batangas</option>
                        <option value="Brgy. 6 Nasugbu, Batangas">Brgy. 6 Nasugbu, Batangas</option>
                        <option value="Brgy. 7 Nasugbu, Batangas">Brgy. 7 Nasugbu, Batangas</option>
                        <option value="Brgy. 8 Nasugbu, Batangas">Brgy. 8 Nasugbu, Batangas</option>
                        <option value="Brgy. 9 Nasugbu, Batangas">Brgy. 9 Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. 10 Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. 11 Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. 12 Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Aga Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Balaytigui Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Banilad Nasugbu, Batangas</option>    
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Bilaran Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Bucana Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Bulihan Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Bunducan Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Butucan Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Calayo Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Catandaan Nasugbu, Batangas</option>
                        <option value="Brgy. 1 Nasugbu, Batangas">Brgy. Cogunan Nasugbu, Batangas</option>
                        <option value="Brgy. 2 Nasugbu, Batangas">Brgy. Dayap Nasugbu, Batangas</option>
                        <option value="Brgy. 3 Nasugbu, Batangas">Brgy. Kaylaway Nasugbu, Batangas</option>
                        <option value="Brgy. 4 Nasugbu, Batangas">Brgy. Kayrilaw Nasugbu, Batangas</option>
                        <option value="Brgy. 5 Nasugbu, Batangas">Brgy. Latag Nasugbu, Batangas</option>
                        <option value="Brgy. 6 Nasugbu, Batangas">Brgy. Looc Nasugbu, Batangas</option>
                        <option value="Brgy. 7 Nasugbu, Batangas">Brgy. Lumabangan Nasugbu, Batangas</option>
                        <option value="Brgy. 8 Nasugbu, Batangas">Brgy. Malapad na Bato Nasugbu, Batangas</option>
                        <option value="Brgy. 9 Nasugbu, Batangas">Brgy. Mataas na Pulo Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Maugat Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Munting Indan Nasugbu, Batangas</option>
                        <option value="Brgy. 10 Nasugbu, Batangas">Brgy. Natipuan Nasugbu, Batangas</option>
                        <option value="Brgy. 1 Nasugbu, Batangas">Brgy. Pantalan Nasugbu, Batangas</option>
                        <option value="Brgy. 2 Nasugbu, Batangas">Brgy. Papaya Nasugbu, Batangas</option>
                        <option value="Brgy. 3 Nasugbu, Batangas">Brgy. Putat Nasugbu, Batangas</option>
                        <option value="Brgy. 4 Nasugbu, Batangas">Brgy. Reparo Nasugbu, Batangas</option>
                        <option value="Brgy. 5 Nasugbu, Batangas">Brgy. Talangan Nasugbu, Batangas</option>
                        <option value="Brgy. 6 Nasugbu, Batangas">Brgy. Tumalim Nasugbu, Batangas</option>
                        <option value="Brgy. 7 Nasugbu, Batangas">Brgy. Utod Nasugbu, Batangas</option>
                        <option value="Brgy. 8 Nasugbu, Batangas">Brgy. Wawa Nasugbu, Batangas</option>
                       </select>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label  for="ContactNo" class="col-md-4 col-form-label text-md-right">Contact No.</label>
                        <div class="col-md-8">
                        <input id="ContactNo" type="text" placeholder="ex. 09123456789"class="form-control{{ $errors->has('ContactNo') ? ' is-invalid' : '' }}" name="ContactNo" value="{{ old('ContactNo') }}">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label  for="OpenHours" class="col-md-4 col-form-label text-md-right">Open Hours</label>
                        <div class="col-md-8">
                        <input id="OpenHours" type="text" placeholder="7:00 AM - 8:00 PM" class="form-control{{ $errors->has('OpenHours') ? ' is-invalid' : '' }}" name="OpenHours" value="{{ old('OpenHours') }}">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label  for="maximum_cust" class="col-md-4 col-form-label text-md-right">Maximum No. of Customer</label>
                        <div class="col-md-8">
                        <input id="maximum_cust" type="text" class="form-control{{ $errors->has('maximum_cust') ? ' is-invalid' : '' }}" name="maximum_cust" value="{{ old('maximum_cust') }}">
                        </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" placeholder="example@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label  for="sp_password" class="col-md-4 col-form-label text-md-right">Store Personnel Password</label>
                        <div class="col-md-8">
                        <input id="sp_password" type="password" placeholder="******" class="form-control{{ $errors->has('sp_password') ? ' is-invalid' : '' }}" name="sp_password" value="{{ old('sp_password') }}">
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Store Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Store Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" placeholder="Re-type Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center" style="margin-top:5%;">
                    <a href="/login">Already have an account?</a>
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