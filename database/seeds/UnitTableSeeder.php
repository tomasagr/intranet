<?php

use Illuminate\Database\Seeder;
use Intranet\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Unit::create([
    		'name' => 'UNIDAD CENTRAL'
    	]);

    	Unit::create([
    		'name' => 'UNIDAD NORTE'
    	]);

    	Unit::create([
    		'name' => 'UNIDAD SUR'
    	]);
    }
}
