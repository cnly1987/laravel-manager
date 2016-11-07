@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left" style="margin-bottom: 10px">产品管理</h1>
        <h1 class="pull-right">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <a class="btn btn-primary pull-left" style="margin-bottom: 10px"  id="add-new">新增产品</a>
                <table id="product" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th id="des"><strong>产品名称</strong></th>
                        <th id="dept"><strong>产品版本</strong></th>
                        <th  id="date"><strong>产品经理</strong></th>
                        <th  id="date"><strong>项目经理</strong></th>
                        <th  id="date"><strong>运维负责人</strong></th>
                        <th  id="date"><strong>环境</strong></th>
                        <th  id="date"><strong>备注</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@include('product.model')

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
    <script src="{{asset('js/wupeng/product_list.js')}}"></script>


@endsection
