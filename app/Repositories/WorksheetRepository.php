<?php

namespace App\Repositories;

use App\Models\Worksheet;
use InfyOm\Generator\Common\BaseRepository;

class WorksheetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ywsj_type',
        'ywsj_bu',
        'ywsj_project_id',
        'ywsj_product_id',
        'ywsj_product_svn',
        'ywsj_product_sku',
        'ywsj_product_name',
        'ywsj_product_version',
        'ywsj_event_name',
        'ywsj_svn_manager',
        'ywsj_oam_manager',
        'ywsj_test_manager',
        'ywsj_product_manager',
        'ywsj_devel_manager',
        'ywsj_top_manager',
        'ywsj_presenter',
        'ywsj_refers',
        'ywsj_start_date',
        'ywsj_end_date',
        'ywsj_man_hour',
        'ywsj_state',
        'ywsj_handler',
        'ywsj_beter_note',
        'ywsj_remark'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Worksheet::class;
    }
}
