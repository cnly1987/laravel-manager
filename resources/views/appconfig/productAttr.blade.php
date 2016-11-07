@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left" style="margin-bottom: 10px"><a href="{{ url('appconfig/product/catagory') }}" >产品分类管理</a>\产品属性类别管理</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="address">
                                <div class="box-header">
                                    <div class="pull-left">
                                        <button id="add" class="btn btn-primary">增加属性</button>
                                    </div>
                                </div>

                                <table id="addressform" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>编号</th>
                                        <th>属性名</th>
                                        <th>属性值</th>
                                        <th>排序</th>
                                        <th>状态</th>
                                        <th>创建日期</th>
                                        <th>更新日期</th>
                                        <th style="text-align: center;width: 15%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $attr as $list )
                                        <tr>
                                            <td>{{ $list['id'] }}</td>
                                            <td>{{ $list['config_name'] }}</td>
                                            <td>{{ $list['config_value'] }}</td>
                                            <td>{{ $list['config_seq'] }}</td>
                                            <td>{{ $list['status'] }}</td>
                                            <td>{{ $list['create_date'] }}</td>
                                            <td>{{ $list['update_date'] }}</td>
                                            <td style="text-align: center;width: 15%">
                                                <button class="update btn btn-warning">修改</button>
                                                <button class="delete btn btn-danger">删除</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    @include('appconfig.pamodel')

@endsection
@section('scripts')

    <script src="{{asset('js/wupeng/product_attr.js')}}"></script>
@endsection
