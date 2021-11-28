<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Settings</title>

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
            @if($errors->has('img'))
            <div class="alert alert-danger" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Update failed</strong><br>
                <ul>
                    {{ $errors->first('img') }}
                </ul>
            </div> 
            @endif
            @if($errors->has('StoreName'))
            <div class="alert alert-danger" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Update failed</strong><br>
                <ul>
                    {{ $errors->first('StoreName') }}
                </ul>
            </div> 
            @endif
            @if($errors->has('maximum_cust'))
            <div class="alert alert-danger" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Update failed</strong><br>
                <ul>
                    {{ $errors->first('maximum_cust') }}
                </ul>
            </div> 
            @endif
            @if($errors->has('StoreOwner'))
            <div class="alert alert-danger" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Update failed</strong><br>
                <ul>
                    {{ $errors->first('StoreOwner') }}
                </ul>
            </div> 
            @endif
            @if($errors->has('email'))
            <div class="alert alert-danger" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Update failed</strong><br>
                <ul>
                    {{ $errors->first('email') }}
                </ul>
            </div> 
            @endif
            @if($message = Session:: get('success-img'))
            <div class="alert alert-success" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success" style="text-center">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{session('success')}}</strong>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col">
                    <a href="sa_settings" style="text-center"class="btn btn-md btn-primary btn-block shadow-sm py-4 mb-3 rounded"><i class="fa fa-folder"></i>Store Account Settings</a>
                    <a href="so_password" class="btn btn-md btn-primary btn-block shadow-sm py-4 mb-3 rounded"><i class="fa fa-folder"></i>Store Password and Security</a>
                    <a href="sp_password" class="btn btn-md btn-primary btn-block shadow-sm py-3 mb-3 rounded"><i class="fa fa-folder"></i>Store Personnel Password and Security</a>
                </div>
            
                <div class="col">
                <div class="card mb-3 text-center">
                    <div class="card-header">Update Profile Image</div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <center>
                            <form enctype="multipart/form-data" action="/sa_settings" method="POST">
                                {{ csrf_field() }}
                                <img id="output" style="width:150px; height:150px;" class="img-thumbnail border-1"/>
                                <input type="file" name="img" onchange="loadFile(event)" class="form-control" style="width:50%; margin:2%;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="pull-right btn btn-sm btn-primary" style="width:auto;">
                            </form>
                            </center>
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
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow mb-4">
        <div class="card-header">
            Change User Information
        </div>
        <div class="card-body" style="margin:1%;">
            
            <form method="POST"  action="{{ route('sa_settings.update') }}" style="">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="formGrooupExampleInput">Store Name</label><br>
                        <input class="form-control" style="width:100%;" id="StoreName" name="StoreName" value="{{ $user['StoreName'] }}" type="text" required>
                    </div>
                    <div class="form-group col-md">
                        <label for="formGrooupExampleInput">Maximum No. of Customer</label><br>
                        <input class="form-control" style="width:100%;" id="maximum_cust" name="maximum_cust" value="{{ $user['maximum_cust'] }}" type="text" required>
                    </div>
                    <div class="form-group col-md">
                        <label for="formGrooupExampleInput">Store Owner</label><br>
                        <input class="form-control" style="width:100%;" id="StoreOwner" name="StoreOwner" value="{{ $user['StoreOwner'] }}" type="text" required>
                    </div>
                    <div class="form-group col-md">
                        <label for="formGrooupExampleInput">Email</label><br>
                        <input class="form-control" style="width:100%;" id="email" name="email" value="{{ $user['email'] }}" type="email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <button class="btn bg-primary text-white btn-md btn-block shadow-sm rounded"><i class="fa fa-folder"></i> Update Information</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    
</div>



@endsection



</body>


<script>
    var loadFile = function(event) {
        // alert('ok');
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>



</html>
