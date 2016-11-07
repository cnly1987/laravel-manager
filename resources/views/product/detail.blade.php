@extends('layouts.app')

@section('content')


<section class="content-header">
    <div style="height: 20px;margin-bottom:20px" >
        <ul class="breadcrumb pull-left" >
            <li>
                <a href="{{ url('product') }}">产品列表列表</a> <span class="divider"></span>
            </li>
            <li class="active">详情</li>
        </ul>

    </div>
</section>


<div class="content">
    <div class="clearfix"></div>
    <div class="box box-warning">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#main" data-toggle="tab">产品基本信息</a></li>
                            <li><a href="#db" data-toggle="tab">数据库信息</a></li>
                            <li><a href="#app" data-toggle="tab">应用信息</a></li>
                            <li><a href="#web" data-toggle="tab">web信息</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <div class="box-header">
                                <div class="pull-left">
                                    <button id="emain" class="btn btn-primary" style="margin-top: -10px">修改基本信息</button>
                                </div>
                            </div>
                            <table  class="table table-hover">
                                <tbody>
                                        <tr>
                                            <td> <label>产品名称:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_name}}"></td>
                                            <td> <label>产品版本号:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_version}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>产品SKU号:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_sku}}"></td>
                                            <td> <label>产品状态:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_status}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>产品经理:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_manager}}"></td>
                                            <td> <label>测试经理:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->test_manager}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>项目经理:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->proj_manager}}"></td>
                                            <td> <label>运维人:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->yunwei}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>产品模式:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_mode}}"></td>
                                            <td> <label>产品架构:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_arch}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>数据库类型:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->database_type}}"></td>
                                            <td> <label>事业部:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->department}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>事业部群组:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->group_name}}"></td>
                                            <td> <label>产品可见状态:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->prod_enable}}"></td>
                                        </tr>
                                        <tr>
                                            <td> <label>license开始日期:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->license_start}}"></td>
                                            <td> <label>license结束日期:</label> <input type="text" class="col-md-6 form-control prd-rd" value="{{$product_info->license_end}}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"> <label>描述备注:</label> <textarea class="form-control prd-rd">{{$product_info->description }}</textarea></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="tab-pane" id="db">
                            <div class="box-header">
                                <div class="pull-left">
                                    <button id="add_db" class="btn btn-primary" style="margin-top: -10px">增加数据库信息</button>
                                </div>
                            </div>

                            <table  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>环境</th>
                                    <th>数据库类型</th>
                                    <th>数据库服务器IP</th>
                                    <th>数据库名称</th>
                                    <th>数据库描述</th>

                                    <th style="text-align: center;width: 25%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $product_dbinfo as $dblist )
                                    <tr>
                                        <td>{{$dblist->prod_environ}}</td>
                                        <td>{{$dblist->db_type}}</td>
                                        <td>{{$dblist->db_ip}}</td>
                                        <td>{{$dblist->db_name}}</td>
                                        <td>{{$dblist->db_desc}}</td>


                                        <td style="text-align: center;width: 15%">
                                            <button class="update btn btn-info">查看</button>
                                            <button class="update btn btn-warning">修改</button>
                                            <button class="delete btn btn-danger">删除</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="app">
                            <div class="box-header">
                                <div class="pull-left">
                                    <button id="add_db" class="btn btn-primary" style="margin-top: -10px">增加应用信息</button>
                                </div>
                            </div>
                            <table  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>环境</th>
                                    <th>应用类型</th>
                                    <th>web服务器IP</th>
                                    <th>web应用端口号</th>
                                    <th>应用描述</th>

                                    <th style="text-align: center;width: 25%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $product_appinfo as $applist )
                                    <tr>
                                        <td>{{$applist->prod_environ}}</td>
                                        <td>{{$applist->prod_type}}</td>
                                        <td>{{$applist->web_ip}}</td>
                                        <td>{{$applist->web_port}}</td>
                                        <td>{{$applist->prod_desc}}</td>


                                        <td style="text-align: center;width: 15%">
                                            <button class="update btn btn-info">查看</button>
                                            <button class="update btn btn-warning">修改</button>
                                            <button class="delete btn btn-danger">删除</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="web">
                            <div class="box-header">
                                <div class="pull-left">
                                    <button id="add_db" class="btn btn-primary" style="margin-top: -10px">增加web信息</button>
                                </div>
                            </div>
                            <table  class="table table-hover">
                                <thead>
                                <tr>
                                    <th>环境</th>
                                    <th>产品域名访问地址</th>
                                    <th>产品登陆用户密码</th>
                                    <th>产品管理员登陆用户密码</th>

                                    <th style="text-align: center;width: 25%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $product_webinfo as $weblist )
                                    <tr>
                                        <td>{{$weblist->prod_environ}}</td>
                                        <td>{{$weblist->sk_outer}}</td>
                                        <td>{{$weblist->user_account}}</td>
                                        <td>{{$weblist->admin_account}}</td>


                                        <td style="text-align: center;width: 15%">
                                            <button class="update btn btn-info">查看</button>
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
                {{-- end table-content --}}

            </div>
        </div>

        </div>
    </div>
</div>

@include('product.model')

@endsection
@section('scripts')
    <script src="{{asset('js/wupeng/product_detail.js')}}"></script>
@endsection
