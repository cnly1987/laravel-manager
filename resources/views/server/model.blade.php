<!-- 查看弹出模型 -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="detailLabel"> <th colspan="2"  style="text-align:center">服务器详情</th></h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                    <tr class="success">
                        <td class="lopk-title">服务器IP：</td>
                        <td><div id="detail_ip"></div></td>
                    </tr>
                    <tr class="danger">
                        <td class="lopk-title">服务器所在机房：</td>
                        <td><div id="detail_addres"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">类型：</td>
                        <td><div id="detail_type"></div></td>
                    </tr>
                    <tr class="danger">
                        <td class="lopk-title">操作系统：</td>
                        <td><div id="detail_os"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">服务器CPU核数：</td>
                        <td><div id="detail_cpu"></div></td>
                    </tr>

                    <tr class="danger">
                        <td class="lopk-title">服务器内存大小：</td>
                        <td><div id="detail_mem"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">服务器硬盘大小：</td>
                        <td><div id="detail_disk"></div></td>
                    </tr>

                    <tr class="danger">
                        <td class="lopk-title">服务器所属事业部：</td>
                        <td><div id="detail_department"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">Zabbix服务器ID：</td>
                        <td><div id="detail_hostid"></div></td>
                    </tr>
                    <tr class="danger">
                        <td class="lopk-title">运维负责人：</td>
                        <td><div id="detail_yw"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">备注：</td>
                        <td><div id="detail_bz"></div></td>
                    </tr>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>

<!-- 修改弹出模型 -->
<div class="modal fade" id="edithtml" tabindex="-1" role="dialog" aria-labelledby="edithtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="edithtmlLabel"><div id="etitle"></div></h4>
            </div>
            <form  id="upserver" method="post" action="{{ url('server/update') }}">
            <div class="modal-body" >
                <div class="form-group" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" class="form-control" id="eid" name="eid" />
                    <label>服务器IP：</label><input type="text" class="form-control uread"  id="eip" name="eip"  />
                    <label>服务器所在机房：</label><select type="text" class="form-control"  id="eaddress" name="eaddress"  >{!! $address !!}</select>
                    <label>服务器类型：</label><select type="text" class="form-control"  id="etype" name="etype"  >{!! $type !!}</select>
                    <label>操作系统：</label><select type="text" class="form-control"  id="eos" name="eos"  >{!! $os !!}</select>
                    <label>服务器CPU核数：</label><input type="text" class="form-control"  id="ecpu" name="ecpu"  />
                    <label>服务器内存大小：</label><input type="text" class="form-control"  id="emem" name="emem"  />
                    <label>服务器硬盘大小：</label><input type="text" class="form-control"  id="edisk" name="edisk"  />
                    <label>所属事业部：</label><input type="text" class="form-control"  id="edepartment" name="edepartment"  />
                    <label>运维负责人：</label><input type="text" class="form-control"  id="eyw" name="eyw"  />
                    <label>备注：</label><textarea type="text" class="form-control"  id="ebz" name="ebz"  ></textarea>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit"  class="btn btn-primary" id="upsub">修改</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--新增弹出模型--}}
<div class="modal fade" id="addhtml" tabindex="-1" role="dialog" aria-labelledby="addhtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addhtmlLabel">新增服务器</h4>
            </div>
            <form  id="addserver" method="post" action="{{ url('server/create') }}">
            <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <label>服务器IP：</label><input type="text" class="form-control"  id="cip" name="cip"  required  />
                            <label>服务器所在机房：</label><select type="text" class="form-control"  id="caddress" name="caddress"  >{!! $address !!}</select>
                            <label>服务器类型：</label><select type="text" class="form-control"  id="ctype" name="ctype"  >{!! $type !!}</select>
                            <label>操作系统：</label><select type="text" class="form-control"  id="cos" name="cos"  >{!! $os !!}</select>
                            <label>服务器CPU核数：</label><input type="text" class="form-control"  id="ccpu" name="ccpu"  />
                            <label>服务器内存大小：</label><input type="text" class="form-control"  id="cmem" name="cmem"  />
                            <label>服务器硬盘大小：</label><input type="text" class="form-control"  id="cdisk" name="cdisk"  />
                            <label>所属事业部：</label><input type="text" class="form-control"  id="cdepartment" name="cdepartment"  />
                            <label>运维负责人：</label><input type="text" class="form-control"  id="cyw" name="cyw"  />
                            <label>备注：</label><textarea type="text" class="form-control"  id="cbz" name="cbz"  > </textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button  class="btn btn-primary" >增加</button>
            </div>
            </form>
        </div>
    </div>
</div>


{{--删除弹出模型--}}
<div class="modal fade" id="deletehtml" tabindex="-1" role="dialog" aria-labelledby="deletehtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="deletehtmlLabel">删除服务器</h4>
            </div>
            <form  id="deletefrom" method="post" action="{{ url('server/delete') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="did" id="did" >
                        </div>
                        <div id="delete_name">是否确认要删除服务器？</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger" >删除</button>
                </div>
            </form>
        </div>
    </div>
</div>