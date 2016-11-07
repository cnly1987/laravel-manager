<?php

namespace App\DataTables;

use App\Models\Product;
use Form;
use Yajra\Datatables\Services\DataTable;

class ProductDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'products.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $products = Product::query();

        return $this->applyScopes($products);
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
            '产品名称' => ['name' => 'pname', 'data' => 'pname'],
            'dep_group' => ['name' => 'dep_group', 'data' => 'dep_group'],
            'department' => ['name' => 'department', 'data' => 'department'],
            'version' => ['name' => 'version', 'data' => 'version'],
            'demo' => ['name' => 'demo', 'data' => 'demo','visible'=>false],
            'public_net' => ['name' => 'public_net', 'data' => 'public_net','visible'=>false],
            'domain' => ['name' => 'domain', 'data' => 'domain','visible'=>false],
            'demo_account' => ['name' => 'demo_account', 'data' => 'demo_account','visible'=>false],
            'demo_admin' => ['name' => 'demo_admin', 'data' => 'demo_admin','visible'=>false],
            'pstatus' => ['name' => 'pstatus', 'data' => 'pstatus'],
            'transfer_status' => ['name' => 'transfer_status', 'data' => 'transfer_status'],
            'product_manager' => ['name' => 'product_manager', 'data' => 'product_manager'],
            'project_manager' => ['name' => 'project_manager', 'data' => 'project_manager'],
            'oam_manager' => ['name' => 'oam_manager', 'data' => 'oam_manager'],
            'description' => ['name' => 'description', 'data' => 'description']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products';
    }
}
