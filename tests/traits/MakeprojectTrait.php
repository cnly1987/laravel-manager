<?php

use Faker\Factory as Faker;
use App\Models\project;
use App\Repositories\projectRepository;

trait MakeprojectTrait
{
    /**
     * Create fake instance of project and save it in database
     *
     * @param array $projectFields
     * @return project
     */
    public function makeproject($projectFields = [])
    {
        /** @var projectRepository $projectRepo */
        $projectRepo = App::make(projectRepository::class);
        $theme = $this->fakeprojectData($projectFields);
        return $projectRepo->create($theme);
    }

    /**
     * Get fake instance of project
     *
     * @param array $projectFields
     * @return project
     */
    public function fakeproject($projectFields = [])
    {
        return new project($this->fakeprojectData($projectFields));
    }

    /**
     * Get fake data of project
     *
     * @param array $postFields
     * @return array
     */
    public function fakeprojectData($projectFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            
        ], $projectFields);
    }
}
