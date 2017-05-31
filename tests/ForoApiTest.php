<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForoApiTest extends TestCase
{
    use MakeForoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateForo()
    {
        $foro = $this->fakeForoData();
        $this->json('POST', '/api/v1/foros', $foro);

        $this->assertApiResponse($foro);
    }

    /**
     * @test
     */
    public function testReadForo()
    {
        $foro = $this->makeForo();
        $this->json('GET', '/api/v1/foros/'.$foro->id);

        $this->assertApiResponse($foro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateForo()
    {
        $foro = $this->makeForo();
        $editedForo = $this->fakeForoData();

        $this->json('PUT', '/api/v1/foros/'.$foro->id, $editedForo);

        $this->assertApiResponse($editedForo);
    }

    /**
     * @test
     */
    public function testDeleteForo()
    {
        $foro = $this->makeForo();
        $this->json('DELETE', '/api/v1/foros/'.$foro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/foros/'.$foro->id);

        $this->assertResponseStatus(404);
    }
}
