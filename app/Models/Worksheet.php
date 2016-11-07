<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Worksheet
 * @package App\Models
 * @version October 12, 2016, 9:28 am UTC
 */
class Worksheet extends Model
{
//    use SoftDeletes;

    public $table = 'gta_oam_worksheet';
    public $primaryKey = 'id';
    
//    const CREATED_AT = 'created_at';
//    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ywsj_type' => 'string',
        'ywsj_bu' => 'string',
        'ywsj_project_id' => 'integer',
        'ywsj_product_id' => 'integer',
        'ywsj_product_svn' => 'string',
        'ywsj_product_sku' => 'string',
        'ywsj_product_name' => 'string',
        'ywsj_product_version' => 'string',
        'ywsj_event_name' => 'string',
        'ywsj_svn_manager' => 'string',
        'ywsj_oam_manager' => 'string',
        'ywsj_test_manager' => 'string',
        'ywsj_product_manager' => 'string',
        'ywsj_devel_manager' => 'string',
        'ywsj_top_manager' => 'string',
        'ywsj_presenter' => 'string',
        'ywsj_refers' => 'string',
        'ywsj_man_hour' => 'float',
        'ywsj_state' => 'string',
        'ywsj_handler' => 'string',
        'ywsj_beter_note' => 'string',
        'ywsj_remark' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
