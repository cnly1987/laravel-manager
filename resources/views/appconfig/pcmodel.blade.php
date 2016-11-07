{{--新增弹出模型--}}
<div class="modal fade" id="addhtml" tabindex="-1" role="dialog" aria-labelledby="addhtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addhtmlLabel">新增分类</h4>
            </div>
            <form  id="add" method="post" action="{{ url('appconfig/product/catagory/create') }}">
            <div class="modal-body">
                    <div class="box-body">

                            <div class="form-group" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="cuser" id="cuser" value="{{ Auth::user()->id }}" />
                                <input type="hidden" name="cdate" id="cdate" value="{{ date("Y-m-d h:i:s") }}" />
                                <label>分类字段名：</label><input type="text" class="form-control"  id="cname" name="cname"   />
                                <label>描述：</label><textarea type="text" class="form-control"  id="cdes" name="cdes"  > </textarea>
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
                <h4 class="modal-title" id="edithtmlLabel"> 修改分类 </h4>
            </div>
            <form  id="update" method="post" action="{{ url('appconfig/product/catagory/update') }}">
                <div class="modal-body" >
                    <div class="form-group" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="eid" id="eid"  />
                        <input type="hidden" name="euser" id="euser" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="edate" id="edate" value="{{ date("Y-m-d h:i:s ") }}" />
                        <label>分类字段名：</label><input type="text" class="form-control"  id="ename" name="ename"   />
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



{{--删除弹出模型--}}
<div class="modal fade" id="deletehtml" tabindex="-1" role="dialog" aria-labelledby="deletehtmlLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="deletehtmlLabel">删除产品分类</h4>
            </div>
            <form  id="delete" method="post" action="{{ url('appconfig/product/catagory/delete') }}">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control"  id="did" name="did"  />
                        </div>
                        <div id="delete_name">是否确认要删除产品分类?</div>
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