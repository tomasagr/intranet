<?php

use Faker\Factory as Faker;
use App\Models\Foro;
use App\Repositories\ForoRepository;

trait MakeForoTrait
{
    /**
     * Create fake instance of Foro and save it in database
     *
     * @param array $foroFields
     * @return Foro
     */
    public function makeForo($foroFields = [])
    {
        /** @var ForoRepository $foroRepo */
        $foroRepo = App::make(ForoRepository::class);
        $theme = $this->fakeForoData($foroFields);
        return $foroRepo->create($theme);
    }

    /**
     * Get fake instance of Foro
     *
     * @param array $foroFields
     * @return Foro
     */
    public function fakeForo($foroFields = [])
    {
        return new Foro($this->fakeForoData($foroFields));
    }

    /**
     * Get fake data of Foro
     *
     * @param array $postFields
     * @return array
     */
    public function fakeForoData($foroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $foroFields);
    }
}
