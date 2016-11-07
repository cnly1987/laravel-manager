<?php

namespace App\Repositories;

use App\Models\project;
use InfyOm\Generator\Common\BaseRepository;

class projectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return project::class;
    }
}
