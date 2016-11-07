
{{--新增弹出模型--}}
<div class="modal fade" id="addhtml" tabindex="-1" role="dialog" aria-labelledby="addhtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addhtmlLabel">新增属性</h4>
            </div>
            <form  id="add" method="post" action="{{ url('appconfig/product/attr/create') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="cid" id="cid" value="{!! Request::segment(5) !!}" />
                            <input type="hidden" name="auser" id="auser" value="{{ Auth::user()->id }}" />
                            <input type="hidden" name="adate" id="adate" value="{{ date("Y-m-d h:i:s") }}" />
                            <label>属性名：</label> <input type="text" class="form-control "   name="aoption" id="aoption" required />
                            <label>属性值：</label><input type="text" class="form-control"  id="avalue" name="avalue"  required  />
                            <label>	排序：</label><input type="text" class="form-control"  id="aorder" name="aorder"  required />
                            <label>状态：</label><select type="text" class="form-control"  id="astatus" name="astatus"  required  >
                                <option value="启用">启用</option>
                                <option value="禁用">禁用</option>
                            </select>
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




<!-- 修改弹出模型 -->
<div class="modal fade" id="edithtml" tabindex="-1" role="dialog" aria-labelledby="edithtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="edithtmlLabel">修改属性</h4>
            </div>
            <form  id="update" method="post" action="{{ url('appconfig/product/attr/update') }}">
            <div class="modal-body" >
                <div class="form-group" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="euser" id="euser" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="edate" id="edate" value="{{ date("Y-m-d h:i:s") }}" />
                    <input type="hidden" name="cid" id="cid" value="{!! Request::segment(5) !!}" />
                    <input type="hidden" name="eid" id="eid"  />
                    <label>属性名：</label> <input type="text" class="form-control "   name="ename" id="ename" required />
                    <label>属性值：</label><input type="text" class="form-control"  id="evalue" name="evalue"  required  />
                    <label>	排序：</label><input type="text" class="form-control"  id="eorder" name="eorder"  required />
                    <label>状态：</label><select type="text" class="form-control"  id="estatus" name="estatus"  required  >
                        <option value="启用">启用</option>
                        <option value="禁用">禁用</option>
                    </select>
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


{{--删除弹出模型--}}
<div class="modal fade" id="deletehtml" tabindex="-1" role="dialog" aria-labelledby="deletehtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="deletehtmlLabel">删除属性</h4>
            </div>
            <form  id="delete" method="post" action="{{ url('appconfig/product/attr/delete') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control"  id="did" name="did"  />
                            <input type="hidden" name="cid" id="cid" value="{!! Request::segment(5) !!}" />
                        </div>
                        <div id="delete_name">是否确认要删除属性？</div>
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