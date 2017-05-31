<?php

use App\Models\Foro;
use App\Repositories\ForoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForoRepositoryTest extends TestCase
{
    use MakeForoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ForoRepository
     */
    protected $foroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->foroRepo = App::make(ForoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateForo()
    {
        $foro = $this->fakeForoData();
        $createdForo = $this->foroRepo->create($foro);
        $createdForo = $createdForo->toArray();
        $this->assertArrayHasKey('id', $createdForo);
        $this->assertNotNull($createdForo['id'], 'Created Foro must have id specified');
        $this->assertNotNull(Foro::find($createdForo['id']), 'Foro with given id must be in DB');
        $this->assertModelData($foro, $createdForo);
    }

    /**
     * @test read
     */
    public function testReadForo()
    {
        $foro = $this->makeForo();
        $dbForo = $this->foroRepo->find($foro->id);
        $dbForo = $dbForo->toArray();
        $this->assertModelData($foro->toArray(), $dbForo);
    }

    /**
     * @test update
     */
    public function testUpdateForo()
    {
        $foro = $this->makeForo();
        $fakeForo = $this->fakeForoData();
        $updatedForo = $this->foroRepo->update($fakeForo, $foro->id);
        $this->assertModelData($fakeForo, $updatedForo->toArray());
        $dbForo = $this->foroRepo->find($foro->id);
        $this->assertModelData($fakeForo, $dbForo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteForo()
    {
        $foro = $this->makeForo();
        $resp = $this->foroRepo->delete($foro->id);
        $this->assertTrue($resp);
        $this->assertNull(Foro::find($foro->id), 'Foro should not exist in DB');
    }
}
