<?php

use App\Models\project;
use App\Repositories\projectRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class projectRepositoryTest extends TestCase
{
    use MakeprojectTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var projectRepository
     */
    protected $projectRepo;

    public function setUp()
    {
        parent::setUp();
        $this->projectRepo = App::make(projectRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateproject()
    {
        $project = $this->fakeprojectData();
        $createdproject = $this->projectRepo->create($project);
        $createdproject = $createdproject->toArray();
        $this->assertArrayHasKey('id', $createdproject);
        $this->assertNotNull($createdproject['id'], 'Created project must have id specified');
        $this->assertNotNull(project::find($createdproject['id']), 'project with given id must be in DB');
        $this->assertModelData($project, $createdproject);
    }

    /**
     * @test read
     */
    public function testReadproject()
    {
        $project = $this->makeproject();
        $dbproject = $this->projectRepo->find($project->id);
        $dbproject = $dbproject->toArray();
        $this->assertModelData($project->toArray(), $dbproject);
    }

    /**
     * @test update
     */
    public function testUpdateproject()
    {
        $project = $this->makeproject();
        $fakeproject = $this->fakeprojectData();
        $updatedproject = $this->projectRepo->update($fakeproject, $project->id);
        $this->assertModelData($fakeproject, $updatedproject->toArray());
        $dbproject = $this->projectRepo->find($project->id);
        $this->assertModelData($fakeproject, $dbproject->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteproject()
    {
        $project = $this->makeproject();
        $resp = $this->projectRepo->delete($project->id);
        $this->assertTrue($resp);
        $this->assertNull(project::find($project->id), 'project should not exist in DB');
    }
}
