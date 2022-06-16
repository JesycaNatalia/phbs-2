@extends('user.layouts.udashboard')

@section('title', 'Dashboard')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/udashboard.css">
@endsection

@section('content')

<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>
            <h4> Anda Belum Mengisi Kuisoner Bulan Januari !</h4>
        </center>
        <!-- jadi nanti ada pengkondisian disini, kalo udah ngisi berarti cardnya -->
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- begin col-3 -->
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>TOTAL ISI KUISONER</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>3 Kali</h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-xl-1 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
            </div>
        </div>

        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>Rata-Rata </h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>50.9</h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-xl-1 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
            </div>
        </div>

        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>KATEGORI</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>Keluarga Sehat</h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <?php
            $dataPoints = array(
                array("label" => "Sehat", "y" => 64.02),
                array("label" => "Belum Sehat", "y" => 4.59)
            )

            ?>
            <script>
                window.onload = function() {


                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "PIE CHART KATEGORI KELUARGA"
                        },
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
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection