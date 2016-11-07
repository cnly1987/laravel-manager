<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class projectApiTest extends TestCase
{
    use MakeprojectTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateproject()
    {
        $project = $this->fakeprojectData();
        $this->json('POST', '/api/v1/projects', $project);

        $this->assertApiResponse($project);
    }

    /**
     * @test
     */
    public function testReadproject()
    {
        $project = $this->makeproject();
        $this->json('GET', '/api/v1/projects/'.$project->id);

        $this->assertApiResponse($project->toArray());
    }

    /**
     * @test
     */
    public function testUpdateproject()
    {
        $project = $this->makeproject();
        $editedproject = $this->fakeprojectData();

        $this->json('PUT', '/api/v1/projects/'.$project->id, $editedproject);

        $this->assertApiResponse($editedproject);
    }

    /**
     * @test
     */
    public function testDeleteproject()
    {
        $project = $this->makeproject();
        $this->json('DELETE', '/api/v1/projects/'.$project->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/projects/'.$project->id);

        $this->assertResponseStatus(404);
    }
}
