@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">服务器管理</h1>
        <h1 class="pull-right">
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <a class="btn btn-primary pull-left" style="margin-bottom: 10px"  id="add-new">新增服务器</a>
                <table id="server" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th id="ip"><strong>IP</strong></th>
                        <th id="addr"><strong>机房</strong></th>
                        <th id="type"><strong>类型</strong></th>
                        <th  id="os"><strong>操作系统</strong></th>
                        <th id="cpu"><strong>CPU</strong></th>
                        <th id="mem"><strong>内存</strong></th>
                        <th id="disk"><strong>硬盘</strong></th>
                        <th id="disk"><strong>所属事业部</strong></th>
                        <th id="man"><strong>负责人</strong></th>
                        <th id="op"><strong>操作</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@include('server.model')

@endsection
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/buttons.server-side.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap.min.js')}}"></script>

    {{-- 以上JS是datatables插件自带的 --}}
    <script src="{{asset('js/wupeng/server.js')}}"></script>
@endsection
