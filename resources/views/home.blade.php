<?php
use App\Http\Controllers\ChartController;
$tot = ChartController::totalcustomer();
$totnow = ChartController::totalnow();
$totout = ChartController::totalout();
$available = ChartController::avail();
$loc = ChartController::location();
$male = ChartController::male();
$female = ChartController::female();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Chart-->
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>

    <!-- Bar chart -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<style>

    .row{
        margin: 1%;
    }

</style>

    <!-- for pie chart -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender','Total Count'],
          <?php echo $gendercount; ?>
        ]);

        var options = {
          title: 'Total Number of Customers by Gender'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- for treemap -->
    <script type="text/javascript">

      google.charts.load('current', {'packages':['treemap']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart()
      {
        var data = google.visualization.arrayToDataTable([
          ['Location', 'Parent', 'Market trade volume (size)'],
          ['Nasugbu',    null,                 0],
          <?php echo $cadds; ?>
        ]);

        tree = new google.visualization.TreeMap(document.getElementById('chart_div'));

        tree.draw(data, {
          minColor: '#f00',
          midColor: '#ddd',
          maxColor: '#0000FF',
          headerHeight: 15,
          fontColor: 'black',
          showScale: true
        });

      }

    </script>

@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card shadow mb-4">
    <div class="card-header">{{ __('Dashboard') }}<p class="text-right"><b><?php echo date("F j, Y l"); ?></b></p>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col d-flex align-items-stretch">
            <div class="card mb-3 text-center" style="width:100%;">
                <div class="card-body">
                    <h6 class="card-title">Total No. of Customer Today</h6>
                    <h4 class="card-text"><?php echo ' ' . $totnow; ?></h4>
                </div>
            </div>
            </div>
            <div class="col d-flex align-items-stretch">
            <div class="card mb-3 text-center" style="width:100%;">
                <div class="card-body">
                    <h6 class="card-title">Current No. of Customer Inside the Store</h6>
                    <h4 class="card-text"><?php echo ' ' . $tot; ?></h4>
                </div>
            </div>
            </div>
            <div class="col d-flex align-items-stretch">
            <div class="card mb-3 text-center" style="width:100%;">
                <div class="card-body">
                    <h6 class="card-title">No. of Customer who have left the Store</h6>
                    <h4 class="card-text"><?php echo ' ' . $totout; ?></h4>
                </div>
                </div>
            </div>
            <div class="col d-flex align-items-stretch">
            <div class="card mb-3 text-center" style="width:100%;">
                <div class="card-body">
                    <h6 class="card-title">Available No. of Customer that can still enter the Store</h6>
                    <h4 class="card-text"><?php echo ' ' . $available; ?>/{{{ Auth::user()->maximum_cust}}}</h4>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Statistics</b></h5>
                </div>
                <div class="col-md-11">
                    <div style="margin:auto;">
                        <canvas id="barChart"><canvas>
                    </div>
                </div>
            </div>
            </div>
        </div>    
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <div id="piechart"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
            </div>
        </div>


<script>
    
    $(function()
    {
        var datas = <?php echo json_encode($datas); ?>;
        var barCanvas = $("#barChart");
        var barChart = new Chart(barCanvas,
        {
            type: 'bar',
            data:
            {
                labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets:[
                    {
                        label:'No. of Customer',
                        data:datas,
                        backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
                    }
                ]
            },
            options:
            {
                title:
                {
                    display:true,
                    text:'Customer per Month',
                },
                legend:
                {
                    position:'bottom',
                    labels:
                    {
                        fontColor:'#000'
                    }
                },
                tooltips:
                {
                    enabled:true
                }
            }
        })
    })
    
</script>


@endsection
