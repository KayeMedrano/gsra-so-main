<?php
use App\Http\Controllers\soController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Information</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="js/dataTables.bootstrap4.min.css" rel="stylesheet">


<style>
    .row{
        margin-bottom: 10px;
    }

    .img-thumbnail {
        width: 150px;
        height: 150px;
    }
</style>

</head>


@extends('layouts.forshow')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
    
        <br>   

        <div class="card shadow mb-4">
        <div class="card-body">
        <div class="text-center">
            <div class="container">
                <div class="row">
                    <a type="button" class="btn btn-outline-secondary" href="/reports">
                        <span class="iconify" data-icon="bi:arrow-return-left"></span> Back
                    </a>
                </div>
                <div class="row">
                    <div class="card" style="margin:0 auto; float:none;">
                    <div class="container-fluid">
                    <b>Customer Information</b>   
                    </div>     
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="container-fluid">
                        <img src="{{ asset('img/' . $show->Image) }}" class="img-thumbnail border-1" alt="User Image">
                </div>
                </div>
                <div class="row">
                <div class="container-fluid">
                    <b>{{$show->CustomerName}}</b>
                </div>
                </div>
                <div class="row">
                <div class="container-fluid">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Account ID</th>
                            <td>{{$show->AccountID}}</td>
                        </tr>
                        <tr>
                            <th>User Name</th>
                            <td>{{$show->UserName}}</td>
                        <tr>
                            <th>Address</th>
                            <td>{{$show->CustomerAddress}}</td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{$show->Age}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$show->Gender}}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>0{{$show->ContactNo}}</td>
                        </tr>
                        
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        
    </div> 
    </div> 

</div> 
</div> 


<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</body>
@endsection

</html>
