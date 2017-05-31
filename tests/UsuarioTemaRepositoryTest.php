<?php

use App\Models\UsuarioTema;
use App\Repositories\UsuarioTemaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioTemaRepositoryTest extends TestCase
{
    use MakeUsuarioTemaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UsuarioTemaRepository
     */
    protected $usuarioTemaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->usuarioTemaRepo = App::make(UsuarioTemaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUsuarioTema()
    {
        $usuarioTema = $this->fakeUsuarioTemaData();
        $createdUsuarioTema = $this->usuarioTemaRepo->create($usuarioTema);
        $createdUsuarioTema = $createdUsuarioTema->toArray();
        $this->assertArrayHasKey('id', $createdUsuarioTema);
        $this->assertNotNull($createdUsuarioTema['id'], 'Created UsuarioTema must have id specified');
        $this->assertNotNull(UsuarioTema::find($createdUsuarioTema['id']), 'UsuarioTema with given id must be in DB');
        $this->assertModelData($usuarioTema, $createdUsuarioTema);
    }

    /**
     * @test read
     */
    public function testReadUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $dbUsuarioTema = $this->usuarioTemaRepo->find($usuarioTema->id);
        $dbUsuarioTema = $dbUsuarioTema->toArray();
        $this->assertModelData($usuarioTema->toArray(), $dbUsuarioTema);
    }

    /**
     * @test update
     */
    public function testUpdateUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $fakeUsuarioTema = $this->fakeUsuarioTemaData();
        $updatedUsuarioTema = $this->usuarioTemaRepo->update($fakeUsuarioTema, $usuarioTema->id);
        $this->assertModelData($fakeUsuarioTema, $updatedUsuarioTema->toArray());
        $dbUsuarioTema = $this->usuarioTemaRepo->find($usuarioTema->id);
        $this->assertModelData($fakeUsuarioTema, $dbUsuarioTema->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUsuarioTema()
    {
        $usuarioTema = $this->makeUsuarioTema();
        $resp = $this->usuarioTemaRepo->delete($usuarioTema->id);
        $this->assertTrue($resp);
        $this->assertNull(UsuarioTema::find($usuarioTema->id), 'UsuarioTema should not exist in DB');
    }
}
