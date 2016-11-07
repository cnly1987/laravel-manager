<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pname',
        'dep_group',
        'department',
        'version',
        'demo',
        'public_net',
        'domain',
        'demo_account',
        'demo_admin',
        'pstatus',
        'transfer_status',
        'product_manager',
        'project_manager',
        'oam_manager',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
