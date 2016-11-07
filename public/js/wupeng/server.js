/**
 * Created by peng.wu2 on 2016/10/27.
 */

$(document).ready(function(){
    $("table th:eq(0)").css('width','70px');
    $("table th:eq(1)").css('width','30px');
    $("table th:eq(2)").css('width','50px');
    $("table th:eq(3)").css('width','80px');
    $("table th:eq(4)").css('width','20px');
    $("table th:eq(5)").css('width','30px');
    $("table th:eq(6)").css('width','40px');
    $("table th:eq(7)").css('width','140px');
    $("table th:eq(8)").css('width','50px');
    $("table th:eq(9)").css('text-align','center');
    var tables = $('#server').DataTable({
            "aProcessing": true,
            "aServerSide": true,
            "ajax":{
                url :window.location.pathname+"/_list",
            },

            aColumns:[
                {data: "groups"},
                {data: "dept_descrip"},
                {data: "department"},
                {data: "modify_date"},
                {data: "dept_status"},
            ],
            aoColumnDefs:[{
                targets: 9,
                render: function (data, type, row) {
                    var status = row[4];
                    html =  '<div class="form-horizontal form-group">' +
                            '<div class="col-xs-3" style="margin-right: 5px"><button id="lookrow"   class="btn btn-success " >查看</button></div>' +
                            '<div class="col-xs-3" style="margin-right: 5px"><button id="editrow"   class="btn btn-primary  " >修改</button></div>' +
                             '<div class="col-xs-3" style="margin-right: 5px"><button id="delrow"  class="btn btn-danger" >删除</button></div></div>';
                    return html;
                }
            }],
            "language":{
                "sProcessing":   "处理中...",
                "lengthMenu": "每页_MENU_ 条记录",
                "paginate": {
                    "previous": "上一页",
                    "next": "下一页"
                },
                "info": "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
                "infoEmpty": "无记录",
                "infoFiltered": "(从 _MAX_ 条记录过滤)",
                "search":"查询",
            },

    });
    $("#add-new").click(function(){
        $("#addhtml").modal("show");
    });
    $('#server tbody').on( 'click', 'button#lookrow', function () {
        var data = tables.row( $(this).parents('tr') ).data();
        $("#detail").modal("show");
        $('#detail_ip').html(data[0]);
        $('#detail_addres').html(data[1]);
        $('#detail_type').html(data[2]);
        $('#detail_os').html(data[3]);
        $('#detail_cpu').html(data[4]);
        $('#detail_mem').html(data[5]);
        $('#detail_disk').html(data[6]);
        $('#detail_department').html(data[7]);
        $('#detail_yw').html(data[8]);
        $('#detail_hostid').html(data[10]);
        $('#detail_bz').html(data[11]);
    });
    $('#server tbody').on( 'click', 'button#editrow', function () {
        var data = tables.row( $(this).parents('tr') ).data();
        $("#edithtml").modal("show");
        $('#etitle').html(data[0]);
        $('#eip').val(data[0]);
        $('#eaddress').val(data[1]);
        $('#etype').val(data[2]);
        $('#eos').val(data[3]);
        $('#ecpu').val(data[4]);
        $('#emem').val(data[5]);
        $('#edisk').val(data[6]);
        $('#edepartment').val(data[7]);
        $('#eyw').val(data[8]);
        $('#eid').val(data[9]);
        $('#ebz').val(data[11]);
    });
    $('#server tbody').on( 'click', 'button#delrow', function () {
        var data = tables.row( $(this).parents('tr') ).data();
        $("#deletehtml").modal("show");
        $('#did').val(data[9]);
    });

    $(".uread").attr('readonly','readonly');
    $("#upsub").click(function(){
        $.ajax({
            url:window.location.pathname + "/create",
            type:'POST',
            data:$("#upserver").serialize(),
            success:function(msg){
            },
        })
    })

})