<?php
use App\Http\Controllers\soController;
$tot = soController::totalamount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="js/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>

@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
<div id="content">

    <div class="card shadow mb-4">
    <div class="card-body">
    <form action='reports' method="GET">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="form-group row">
                        <label for="date" class="col-form-label">Date from</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                        </div>
                        <label for="date" class="col-form-label">Date to</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" name="search" titke="Search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



        <br>
    <div>
    <!-- <h6 class="collapse-header">Overall Number of Customers:
        <?php #echo ' ' . $tot; ?>
        <br>
    </h6> -->
    </div>

        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead>
            <tr>
                <th>Customer ID</th>
                <th>Date/Time In </th>
                <th>Date/Time Out </th>
                <th>Action</th>

            </tr></thead>
            @foreach ($data as $sh)
            <tr>

            <td>{{$sh->AccountID}}</td>
            <td>{{$sh->time_in}}</td>
            <td>{{$sh->time_out}}</td>
            <td><a href="/report/id/{{$sh->AccountID}}">View</a></td>

            </tr>
            @endforeach
        </table>
        </div></div>
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

</body>

</html>
