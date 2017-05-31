<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTemaApiTest extends TestCase
{
    use MakeUsuarioTemaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUsuarioTema()
    {
        $usuarioTema = $this->fakeUsuarioTemaData();
        $this->json('POST', '/api/v1/usuarioTemas', $usuarioTema);

        $this->assertApiResponse($usuarioTema);
    }

    /**
     * @test
     */
    public function testReadUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $this->json('GET', '/api/v1/usuarioTemas/'.$usuarioTema->id);

        $this->assertApiResponse($usuarioTema->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $editedUsuarioTema = $this->fakeUsuarioTemaData();

        $this->json('PUT', '/api/v1/usuarioTemas/'.$usuarioTema->id, $editedUsuarioTema);

        $this->assertApiResponse($editedUsuarioTema);
    }

    /**
     * @test
     */
    public function testDeleteUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $this->json('DELETE', '/api/v1/usuarioTemas/'.$usuarioTema->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/usuarioTemas/'.$usuarioTema->id);

        $this->assertResponseStatus(404);
    }
}
