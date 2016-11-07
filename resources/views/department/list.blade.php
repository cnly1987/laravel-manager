@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">事业部管理</h1>
        <h1 class="pull-right">
        </h1>
    </section>

    <div class="content">

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                <a class="btn btn-primary pull-left" style="margin-bottom: 10px"  id="add-new">新增事业部群组</a>
                <table id="department" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th id="groups"><strong>事业部群</strong></th>
                        <th id="des"><strong>事业部描述</strong></th>
                        <th id="dept"><strong>下属事业部</strong></th>
                        <th  id="date"><strong>更新日期</strong></th>
                        <th id="status"><strong>状态</strong></th>
                        <th id="op"><strong>操作</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@include('department.model')

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
    <script src="{{asset('js/wupeng/department.js')}}"></script>
@endsection
