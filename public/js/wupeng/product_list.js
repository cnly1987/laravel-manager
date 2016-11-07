/**
 * Created by peng.wu2 on 2016/11/7.
 */
$(document).ready(function(){
    $('#product').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        ajax: window.location.pathname + '/_list',
        "language":{
            "sProcessing":   "处理中...",
            "lengthMenu": "_MENU_ 条记录每页",
            "paginate": {
                "previous": "上一页",
                "next": "下一页"
            },
            "info": "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
            "infoEmpty": "无记录",
            "infoFiltered": "(从 _MAX_ 条记录过滤)",
            "search":"查询",
        },
        "fnRowCallback":function(nRow,aData,iDisplayIndex){
            $('td:eq(0)', nRow).html('<a href="'+ window.location.pathname +'/' + aData[7] + '">' +
                aData[0] + '</a>');
            return nRow;
        },
    });

})