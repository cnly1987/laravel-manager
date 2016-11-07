<?php

namespace App\DataTables;

use App\Models\Worksheet;
use Form;
use Yajra\Datatables\Services\DataTable;

class WorksheetDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'worksheets.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $worksheets = Worksheet::query();

        return $this->applyScopes($worksheets);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            '事件类型' => ['name' => 'ywsj_type', 'data' => 'ywsj_type'],
            '所属事业部' => ['name' => 'ywsj_bu', 'data' => 'ywsj_bu'],
            '项目编号' => ['name' => 'ywsj_project_id', 'data' => 'ywsj_project_id','visible'=>false],
            '产品编号' => ['name' => 'ywsj_product_id', 'data' => 'ywsj_product_id','visible'=>false],
            'SVN地址' => ['name' => 'ywsj_product_svn', 'data' => 'ywsj_product_svn','visible'=>false],
            '产品SKU' => ['name' => 'ywsj_product_sku', 'data' => 'ywsj_product_sku','visible'=>false],
            '产品名称' => ['name' => 'ywsj_product_name', 'data' => 'ywsj_product_name'],
            '版本' => ['name' => 'ywsj_product_version', 'data' => 'ywsj_product_version'],
            '事件描述' => ['name' => 'ywsj_event_name', 'data' => 'ywsj_event_name'],
            '配置管理员' => ['name' => 'ywsj_svn_manager', 'data' => 'ywsj_svn_manager','visible'=>false],
            '运维经理' => ['name' => 'ywsj_oam_manager', 'data' => 'ywsj_oam_manager','visible'=>false],
            '测试经理' => ['name' => 'ywsj_test_manager', 'data' => 'ywsj_test_manager','visible'=>false],
            '产品经理' => ['name' => 'ywsj_product_manager', 'data' => 'ywsj_product_manager','visible'=>false],
            '项目经理' => ['name' => 'ywsj_devel_manager', 'data' => 'ywsj_devel_manager','visible'=>false],
            '高层' => ['name' => 'ywsj_top_manager', 'data' => 'ywsj_top_manager','visible'=>false],
            '关联人' => ['name' => 'ywsj_presenter', 'data' => 'ywsj_presenter','visible'=>false],
            'ywsj_refers' => ['name' => 'ywsj_refers', 'data' => 'ywsj_refers','visible'=>false],
            '开始时间' => ['name' => 'ywsj_start_date', 'data' => 'ywsj_start_date'],
            '结束时间' => ['name' => 'ywsj_end_date', 'data' => 'ywsj_end_date','visible'=>false],
            '耗时' => ['name' => 'ywsj_man_hour', 'data' => 'ywsj_man_hour','visible'=>false],
            '状态' => ['name' => 'ywsj_state', 'data' => 'ywsj_state'],
            '处理人' => ['name' => 'ywsj_handler', 'data' => 'ywsj_handler'],
            'ywsj_beter_note' => ['name' => 'ywsj_beter_note', 'data' => 'ywsj_beter_note','visible'=>false],
            '备注' => ['name' => 'ywsj_remark', 'data' => 'ywsj_remark','visible'=>false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'worksheets';
    }
}
