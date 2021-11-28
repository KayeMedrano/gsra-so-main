<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>gsra-so</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            
            body 
            {
                font-family: 'Nunito', sans-serif;
            }
            
        </style>
    </head>


@extends('layouts.app')

@section('content')



<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">


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
                        <div class="text-center" style="margin-top: 25%;">
                            <h1 class="h4 text-gray-900 mb-4">Grocery Store Recommender App</h1>
                            <h1 class="h4 text-gray-900 mb-4">gsra-for-store-owner</h1>
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


@endsection



    
</html>
