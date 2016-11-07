@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    <script type="text/javascript">
        (function ($, DataTable) {
            $.extend(true, DataTable.defaults, {
                language: {
                    "sProcessing": "加载中...",
                    "sInfo": "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
                    "sInfoEmpty": "无记录",
                    "sInfoFiltered": "(从 _MAX_ 条记录过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "查询:",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sLast": "末页",
                        "sNext": "下一页",
                        "sPrevious": "上一页"
                    },
                }
            });
        })(jQuery, jQuery.fn.dataTable);
    </script>
    {!! $dataTable->scripts() !!}
@endsection