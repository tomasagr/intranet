<?php

use Illuminate\Database\Seeder;
use Intranet\Models\Panel\Contenido;

class ContenidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contenido::create([
            'titulo' => 'Summit Solidaria',
            'cuerpo' => 'Texto inicial',
            'tag' => 'SOLIDARIA'
        ]);

        Contenido::create([
            'titulo' => 'Summit Regional',
            'cuerpo' => 'Texto inicial',
            'tag' => 'REGIONAL'
        ]);

        Contenido::create([
            'titulo' => 'Summit Begreen',
            'cuerpo' => 'Texto inicial',
            'tag' => 'BEGREEN'
        ]);

        Contenido::create([
            'titulo' => 'Quienes Somos',
            'cuerpo' => 'Texto inicial',
            'tag' => 'NOSOTROS'
        ]);
    }
}
