@extends('layouts.app')

@section('content')
    <div class="content">

        <div style="text-align:center"><h3><b>运维事件分类统计图</b></h3></div>
        <div id="container1" style="min-width: 300px; height: 400px; margin: 0 auto"></div><div><br><br></div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/highcharts.js') }}" ></script>
    {{--<script type="text/javascript" src="{{ asset('js/exporting.js') }}" ></script>--}}
    <script type="text/javascript">
        Highcharts.setOptions({
            colors: ['#50B432', '#DDDF00', '#ED561B',  '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4','#ff0000',]
        });
        $('#container1').highcharts({
            chart: {
                backgroundColor: '#ffffff',
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: '来源: 运维平台数据库'
            },
            xAxis: {
                categories: {!! $department !!},
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '14px',
                        fontFamily: '微软雅黑',
                        "font-weight": "bold"
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '数量'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y} </b>'

            },
            series:  {!! $data !!},
        });
    </script>

@endsection

