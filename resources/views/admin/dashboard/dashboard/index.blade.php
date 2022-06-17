@extends('admin.layouts.dashboard')

@section('title', 'Dashboard')

@section('style')
@endsection

@section('content')

<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>
            <h4> DASHBOARD ADMIN</h4>
        </center>
        <!-- jadi nanti ada pengkondisian disini, kalo udah ngisi berarti cardnya -->
    </div>
</div>

<?php

$dataPoints = array(
    array("label" => "Januari", "y" => 64.02),
    array("label" => "Februari", "y" => 12.55),
    array("label" => "Maret", "y" => 8.47),
    array("label" => "April", "y" => 6.08),
    array("label" => "Mei", "y" => 4.29),
    array("label" => "Juni", "y" => 4.59)
)

?>
<script>
    window.onload = function() {


        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Total Pengisian Kuisoner Perbulan"
            },
            subtitles: [{
                text: "November 2017"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

@endsection

@section('script')
@endsection