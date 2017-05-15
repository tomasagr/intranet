<?php

use Illuminate\Database\Seeder;
use Intranet\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
        	'name' => '¿Lugar favorito en el mundo?'
        ]);
    }
}
