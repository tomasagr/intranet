<?php

use Illuminate\Database\Seeder;
use Intranet\Sector;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
        	'name' => 'Dirección'
        ]);

        Sector::create([
        	'name' => 'Marketing',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Registros',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'RRHH',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Créditos y Cobranza',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Administración y Finanzas',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Contabilidad',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Logística y Planificación',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Investigación y Desarrollo',
        	'unit_id' => 1,
        ]);

        Sector::create([
        	'name' => 'Ventas',
        	'unit_id' => 2,
        ]);

        Sector::create([
        	'name' => 'Marketing',
        	'unit_id' => 2,
        ]);

        Sector::create([
        	'name' => 'Investigación y Desarrollo',
        	'unit_id' => 2,
        ]);
    }
}
