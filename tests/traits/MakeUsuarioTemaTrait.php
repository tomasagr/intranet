<?php

use Faker\Factory as Faker;
use App\Models\UsuarioTema;
use App\Repositories\UsuarioTemaRepository;

trait MakeUsuarioTemaTrait
{
    /**
     * Create fake instance of UsuarioTema and save it in database
     *
     * @param array $usuarioTemaFields
     * @return UsuarioTema
     */
    public function makeUsuarioTema($usuarioTemaFields = [])
    {
        /** @var UsuarioTemaRepository $usuarioTemaRepo */
        $usuarioTemaRepo = App::make(UsuarioTemaRepository::class);
        $theme = $this->fakeUsuarioTemaData($usuarioTemaFields);
        return $usuarioTemaRepo->create($theme);
    }

    /**
     * Get fake instance of UsuarioTema
     *
     * @param array $usuarioTemaFields
     * @return UsuarioTema
     */
    public function fakeUsuarioTema($usuarioTemaFields = [])
    {
        return new UsuarioTema($this->fakeUsuarioTemaData($usuarioTemaFields));
    }

    /**
     * Get fake data of UsuarioTema
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUsuarioTemaData($usuarioTemaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tema_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $usuarioTemaFields);
    }
}
