@extends('layouts.admin')
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "BYN", { role: "style" } ],
                <?php echo $data['diagram'] ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "BYN",
                width: 900,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
    <div class="container-fluid py-4">
        <h3>Статистика продаж по брендам</h3>
        <div id="columnchart_values" style="width: 900px; height: 800px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $data['count'] ?>
            ]);

            var options = {
                title: 'Статистика поставок по брендам (в литрах)',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $data['price'] ?>
            ]);

            var options = {
                title: 'Статистика продаж по брендам (в BYN)',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $pieChartLocationStatistic ?>
            ]);

            var options = {
                title: 'Статистика поставок по регионам (общая для всех брендов)',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3dlocation'));
            chart.draw(data, options);
        }
    </script>
    @if(isset($regionChart))
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                        <?php echo $regionChart ?>
                ]);

                var options = {
                    title: 'Статистика поставок по <?php echo $location?>',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_region'));
                chart.draw(data, options);
            }
        </script>
    @endif

    <div class="container-fluid py-4">
        <h3>Статистика по брендам</h3>
        <div style="display:flex" class="col-lg-26 mb-lg-0 mb-4 mt-3">
            <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            <div id="piechart_3d2" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <h3>Статистика по регионам</h3>
        <div class="col-lg-26 mb-lg-0 mb-4 mt-3">
            <div id="piechart_3dlocation" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <h3>Статистика по определенному региону</h3>
        <div style="display:block" class="mb-1">
            <h5>Выбор региона</h5>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Минск'])}}">Минск</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Минская область'])}}">Минская область</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Могилевская область'])}}">Могилевская область</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Брестская область'])}}">Брестская область</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Гомельская область'])}}">Гомельская область</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Гродненская область'])}}">Гродненская область</a></div>
            <div style="margin-right: 5px"><a  href="{{route('statistic.index.filterable', ['location'=>'Витебская область'])}}">Витебская область</a></div>

        </div>
        <div class="col-lg-26 mb-lg-0 mb-4 mt-3">
            <div id="piechart_3d_region" style="width: 900px; height: 500px;"></div>
        </div>
    </div>
@endsection
