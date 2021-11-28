<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    
    .row
    {
        margin: 1%;
    }

</style>


@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-body">
        <div class="row justify-content-center">
                
                <div class="col">
                    <a href="sa_settings" style="text-center"class="btn btn-md btn-primary btn-block shadow-sm py-4 mb-3 rounded"><i class="fa fa-folder"></i>Store Account Settings</a>
                    <a href="so_password" class="btn btn-md btn-primary btn-block shadow-sm py-4 mb-3 rounded"><i class="fa fa-folder"></i>Store Password and Security</a>
                    <a href="sp_password" class="btn btn-md btn-primary btn-block shadow-sm py-3 mb-3 rounded"><i class="fa fa-folder"></i>Store Personnel Password and Security</a>
                </div>
            
                <div class="col">
                <div class="card mb-3 text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 py-4" style="">
                            <h4>CHANGE STORE PERSONNEL PASSWORD</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('sp_password.update') }}" style="text-align:left; margin:1%;">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                            <div class="form-row">
                            <div class="form-group col-md">
                                <label for="formGrooupExampleInput">Store Email Address</label><br>
                                <input readonly type="text" class="form-control @error('email') is invalid @enderror" style="width:100%;" id="email" name="email" value="{{ $user['email'] }}">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md">
                                <label for="formGrooupExampleInput">New Store Personnel Password</label><br>
                                <input type="password" class="form-control @error('newpass') is invalid @enderror" style="width:100%;" id="sp_password" name="sp_password">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md">
                                <button class="btn bg-primary text-white btn-md btn-block shadow-sm p-3 mb-3 rounded"><i class="fa fa-folder"></i> Update Store Personnel Password</button>
                            </div>
                            </div>
                    </form>
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

@endsection
