@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap.min.css') }}">
@endsection
@section('content')

    <section class="content-header">
        <div style="height: 20px;margin-bottom:20px" >
            <ul class="breadcrumb pull-left" >
                <li>
                    <a href="{{ url('devsuite') }}">Devsuite列表</a> <span class="divider"></span>
                </li>
                <li class="active">详情</li>
            </ul>

        </div>
    </section>


    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title" id="pro_title">{{ $data['ProjectName'] }}</h3>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目类别</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['proj_type'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">申请地域</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['address'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">优先级</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['priority'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">产品类型</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['prod_type'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">类型</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['type'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">产品名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['prod_name'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">产品简称</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['prod_short'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目名称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['proj_name'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目编号</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['proj_code'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目简称</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['proj_short'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">开始时间</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['start_time'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">结束时间</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['end_time'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">产品经理</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['prod_manager'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目经理</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['proj_manager'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">基础版本</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['prod_version'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">项目规模（人月）</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['proj_scale'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">合同金额（元）</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['proj_money'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">加密方式</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['encrypt'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">项目概述:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['proj_info'] }}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">测试团队是否介入</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['test_team'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">市场代表</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['market_person'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">销售人员</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['sale_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">策划人员</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['plan_person'] }}" >
                        </div>
                    </div>
                </div>



                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">需求分析师</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['demand_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">架构师</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['architect'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">开发代表</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['develop_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">开发工程师</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['developer'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">测试工程师</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['test_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">测试代表</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['test_deputy'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">运维代表</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['yw_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">QA</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['qa'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">数据库工程师</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['db_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">CM</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['cm'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">视觉/交互</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['ui'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">CCB组长</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['ccb'] }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">CCB成员</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control oam-read"  value="{{ $data['ccb_person'] }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label  class="col-sm-3 control-label">关联项目及主要对接人</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control oam-read"  value="{{ $data['broker'] }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">Make of Buy策略:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['make_buy'] }}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">项目目标_时间目标:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['time_target'] }}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">项目目标_成本目标:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['cost_target'] }}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">项目目标_质量目标:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['qa_target'] }}</textarea>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="form-group col-sm-12">
                        <label  class=" col-sm-3 control-label">项目目标_项目风险:</label>
                    </div>
                    <div class=" col-sm-12">
                        <textarea type="email" class="form-control oam-read"  style="margin-left: 10px;width: 98%"> {{ $data['proj_risk'] }}</textarea>
                    </div>
                </div>



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
