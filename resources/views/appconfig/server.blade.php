@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left" style="margin-bottom: 10px">服务器配置管理</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#address" data-toggle="tab">机房配置管理</a></li>
                                <li><a href="#type" data-toggle="tab">机器类型管理</a></li>
                                <li><a href="#os" data-toggle="tab">操作系统管理</a></li>
                            </ul>
                         </div>

                         <div class="tab-content">
                                <div class="tab-pane active" id="address">
                                        <div class="box-header">
                                            <div class="pull-left">
                                                <button id="add1" class="btn btn-primary">增加字段</button>
                                            </div>
                                        </div>

                                        <table id="addressform" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>选项属性</th>
                                                <th>选项值</th>
                                                <th>排序</th>
                                                <th>状态</th>
                                                <th>描述</th>
                                                <th style="text-align: center;width: 15%">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($address as $list)
                                            <tr>
                                                <td>{{ $list->option }}</td>
                                                <td>{{ $list->value }} </td>
                                                <td>{{ $list->order }} </td>
                                                <td>{{ $list->status }}</td>
                                                <td>{{ $list->description }} </td>
                                                <td style="text-align: center;width: 15%">
                                                    <button class="aupdate btn btn-warning">修改</button>
                                                    <button class="adelete btn btn-danger">删除</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                </div>


                                <div class="tab-pane" id="type">
                                    <div class="box-header">
                                        <div class="pull-left">
                                            <button id="add2"  class="btn btn-primary">增加字段</button>
                                        </div>
                                    </div>
                                    <table  id="typeform" class="table table-hover">
                                        <tr>
                                            <th>选项属性</th>
                                            <th>选项值</th>
                                            <th>排序</th>
                                            <th>状态</th>
                                            <th>描述</th>
                                            <th style="text-align: center;width: 15%">操作</th>
                                        </tr>
                                        <tbody>
                                        @foreach ($type as $list)
                                            <tr>
                                                <td>{{ $list->option }}</td>
                                                <td>{{ $list->value }} </td>
                                                <td>{{ $list->order }} </td>
                                                <td>{{ $list->status }} </td>
                                                <td>{{ $list->description }} </td>
                                                <td style="text-align: center;width: 15%">
                                                    <button class="tupdate btn btn-warning">修改</button>
                                                    <button class="tdelete btn btn-danger">删除</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="os">
                                    <div class="box-header">
                                        <div class="pull-left">
                                            <button id="add3" class="btn btn-primary">增加字段</button>
                                        </div>
                                    </div>
                                    <table id="osform" class="table table-hover">
                                        <tr>
                                            <th>选项属性</th>
                                            <th>选项值</th>
                                            <th>排序</th>
                                            <th>状态</th>
                                            <th>描述</th>
                                            <th style="text-align: center;width: 15%">操作</th>
                                        </tr>
                                        @foreach ($os as $list)
                                            <tr>
                                                <td>{{ $list->option }}</td>
                                                <td>{{ $list->value }} </td>
                                                <td>{{ $list->order }} </td>
                                                <td>{{ $list->status }} </td>
                                                <td>{{ $list->description }} </td>
                                                <td style="text-align: center;width: 15%">
                                                    <button class="oupdate btn btn-warning">修改</button>
                                                    <button class="odelete btn btn-danger">删除</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>

                            </div>

                        </div>
                    {{-- end table-content --}}

                    </div>
                 </div>
             </div>
        </div>

    </div>
@include('appconfig.smodel')

@endsection
@section('scripts')

    <script src="{{asset('js/wupeng/serverconfig.js')}}"></script>
@endsection
