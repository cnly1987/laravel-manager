@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/oam.css') }}">
@endsection
@section('content')
    <section class="content-header">

        <h1 class="pull-left" id="dev_title">Devsuite项目列表</h1>
        <h1 class="pull-right">
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table id="devsuite" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th c="type"><strong>项目类别</strong></th>
                        <th id="ptype"><strong>项目类别</strong></th>
                        <th id="pname"><strong>产品名称</strong></th>
                        <th  id="name"><strong>项目名称</strong></th>
                        <th id="start_date"><strong>立项日期</strong></th>
                        <th id="end_date"><strong>结项日期</strong></th>
                        <th id="pmanager"><strong>产品经理</strong></th>
                        <th id="manager"><strong>项目经理</strong></th>
                    </tr>
                    </thead>
                    {{--底部筛选--}}
                    {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>项目类别</th>--}}
                            {{--<th>项目类别</th>--}}
                            {{--<th>产品名称</th>--}}
                            {{--<th>项目名称</th>--}}
                            {{--<th>立项日期</th>--}}
                            {{--<th>结项日期</th>--}}
                            {{--<th>产品经理</th>--}}
                            {{--<th>项目经理</th>--}}
                        {{--</tr>--}}
                    {{--</tfoot>--}}
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/buttons.server-side.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.min.js')}}"></script>
    {{-- 以上JS是datatables插件自带的 --}}
    <script src="{{asset('js/wupeng/devsuite.js')}}"></script>
@endsection
