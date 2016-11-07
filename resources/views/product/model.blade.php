<!-- 新增弹出模型 -->
<div class="modal fade" id="addhtml" tabindex="-1" role="dialog" aria-labelledby="addhtmlLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="addhtmlLabel">新增事业部</h4>
                </div>
                <form  id="add-form" method="post" action="{{ url('department/createDepartment') }}">
                <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label>事业部群：</label><input type="text" class="form-control" id="dep-name" disabled>
                                <input type="hidden" name="dept_pid" id="dept_pid" value="">
                                <input type="hidden" name="create_date" id="create_date" value="{{ date("Y-m-d h:i:s") }}">
                                <input type="hidden" name="create_user" id="create_user" value=" {{  Auth::user()->id }}">
                                <input type="hidden" name="modify_user" id="modify_user" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="modify_date" id="modify_date" value="{{ date("Y-m-d h:i:s") }}">
                                <input type="hidden" name="dept_status" id="dept_status" value="1"  >
                            </div>
                            <div class="form-group">
                                <label>事业部名称：</label>
                                <input type="text"  class="form-control" id="departmentName"  name="departmentName" required />
                            </div>
                         </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" id="#add_sub" class="btn btn-primary">保存</button>
                </div>
                </form>
            </div>
        </div>

</div>




<!-- 查看弹出模型 -->
<div class="modal fade" id="lookhtml" tabindex="-1" role="dialog" aria-labelledby="lookhtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="lookhtmlLabel"><div id="look-title"></div></h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2"  style="text-align:center">群组详情</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="success">
                        <td class="lopk-title">事业部群：</td>
                        <td><div id="look-group"></div></td>
                    </tr>
                    <tr class="danger">
                        <td class="lopk-title">事业部描述：</td>
                        <td><div id="look-des"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">下属事业部：</td>
                        <td><div id="look-department"></div></td>
                    </tr>
                    <tr class="danger">
                        <td class="lopk-title">更新日期：</td>
                        <td><div id="look-date"></div></td>
                    </tr>
                    <tr class="success">
                        <td class="lopk-title">状态：</td>
                        <td><div id="look-status"></div></td>
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
                <h4 class="modal-title" id="edithtmlLabel"><div id="edit-title"></div></h4>
            </div>
            <form  id="edit-form" method="post" action="{{ url('department/update') }}">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" class="form-control" id="groupId" name="groupId" />
                    <label>事业部群：</label><input type="text" class="form-control"  id="groupName" name="groupName" required />
                    <label>事业部描述：</label><textarea type="text" class="form-control" id="groupDes" name="groupDes"  ></textarea>
                    <label>状态：</label><select name="groupStaus" id="groupStaus" class="form-control select2" style="width: 100%;"  required >
                                        <option  value="已发布">已发布</option>
                                        <option value="未发布">未发布</option>
                    </select>
                    <input type="hidden" name="Gmodify_user" id="Gmodify_user" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="Gmodify_date" id="Gmodify_date" value="{{ date("Y-m-d h:i:s") }}" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{--新增事业部群--}}
<div class="modal fade" id="addgrouphtml" tabindex="-1" role="dialog" aria-labelledby="addgrouphtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addgrouphtmlLabel">新增事业部</h4>
            </div>
            <form  id="addgroup-form" method="post" action="{{ url('department/createGroup') }}">
            <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>事业部群：</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control" id="adepartmentName"  name="adepartmentName"  required >
                            <input type="hidden" name="acreate_date" id="acreate_date" value="{{ date("Y-m-d h:i:s") }}">
                            <input type="hidden" name="acreate_user" id="acreate_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="amodify_date" id="amodify_date" value="{{ date("Y-m-d h:i:s") }}">
                            <input type="hidden" name="amodify_user" id="amodify_user" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <label>事业部群描述：</label>
                            <textarea type="text" class="form-control" id="adepartmentDes"  name="adepartmentDes"> </textarea>
                        </div>
                        <div class="form-group">
                            <label>状态：</label><select name="agroupStaus" id="agroupStaus" class="form-control select2" style="width: 100%;">
                                <option  value="1">已发布</option>
                                <option value="0">未发布</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{--下架事业部群--}}
<div class="modal fade" id="downgrouphtml" tabindex="-1" role="dialog" aria-labelledby="downgrouphtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="downgrouphtmlLabel">下架事业部群</h4>
            </div>
            <form  id="down-form" method="post" action="{{ url('department/down') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="down_id" id="down_id" >
                        </div>
                        <div id="down_name">是否确认下架:</div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">下架</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--上架事业部群--}}
<div class="modal fade" id="upgrouphtml" tabindex="-1" role="dialog" aria-labelledby="upgrouphtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="upgrouphtmlLabel">上架事业部群</h4>
            </div>
            <form  id="down-form" method="post" action="{{ url('department/up') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_id" id="up_id" >
                        </div>
                        <div id="up_name">是否确认上架:</div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">上架</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--删除事业部群--}}
<div class="modal fade" id="deletehtml" tabindex="-1" role="dialog" aria-labelledby="deletehtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="deletehtmlLabel">删除事业部群</h4>
            </div>
            <form  id="delete-form" method="post" action="{{ url('department/delete') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="delete_id" id="delete_id" >
                        </div>
                        <div id="delete_name">是否确认要删除:</div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">删除</button>
                </div>
            </form>
        </div>
    </div>
</div>