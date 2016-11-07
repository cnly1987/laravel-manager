<!-- 修改弹出模型 -->
<div class="modal fade" id="edithtml" tabindex="-1" role="dialog" aria-labelledby="edithtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="edithtmlLabel"><div id="etitle"></div></h4>
            </div>
            <form  id="update" method="post" action="{{ url('appconfig/server/update') }}">
            <div class="modal-body" >
                <div class="form-group" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden"  name="ename" id="ename" >
                    <label>选项属性：</label><input type="text" class="form-control"  id="eoption" name="eoption"  readonly="readonly"  />
                    <label>	选项值：</label><input type="text" class="form-control"  id="evalue" name="evalue"  readonly="readonly"  />
                    <label>排序：</label><input type="text" class="form-control"  id="eorder" name="eorder"  required  />
                    <label>	状态：</label><select  class="form-control"  id="estatus" name="estatus" >
                                            <option value="启用">启用</option>
                                            <option value="禁用">禁用</option>
                                            </select>
                    <label>描述：</label><textarea type="text" class="form-control"  id="edes" name="edes"  > </textarea>
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
            <form  id="add" method="post" action="{{ url('appconfig/server/create') }}">
            <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <label>配置属性：</label> <input type="text" class="form-control "   name="sname" id="sname"  readonly="readonly" />
                            <label>选项属性：</label><input type="text" class="form-control"  id="soption" name="soption"  required  />
                            <label>	选项值：</label><input type="text" class="form-control"  id="svalue" name="svalue"  required />
                            <label>排序：</label><input type="text" class="form-control"  id="sorder" name="sorder"  required  />
                            <label>	状态：</label><select type="text" class="form-control"  id="sstatus" name="sstatus"  required  >
                                                    <option value="启用">启用</option>
                                                    <option value="禁用">禁用</option>
                                                    </select>
                            <label>描述：</label><textarea type="text" class="form-control"  id="sdes" name="sdes"  > </textarea>
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
                <h4 class="modal-title" id="deletehtmlLabel">删除字段</h4>
            </div>
            <form  id="delete" method="post" action="{{ url('appconfig/server/delete') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control"  id="doption" name="doption"  />
                        </div>
                        <div id="delete_name">是否确认要删除字段?</div>
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