<?php

use Illuminate\Database\Seeder;
use Intranet\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names =  [
            'manuales' => 'MANUALS',
            'usuarios' => 'USERS',
            'tema' => 'TOPIC',
            'agenda' => 'SCHEDULE',
            'noticias' => 'NEWS',
            'products' => 'PRODUCTS',
            'rse' => 'RSE',
            'solidaria' => 'SOLIDARIA',
            'regional' => 'REGIONAL',
            'begreen' => 'VIDEOS',
            'mensajes' => 'TOPICS'
        ];
 
        foreach ($names as $name => $tag) {
            $this->createAbm($name, $tag);
        }
    }

    public function createAbm($name, $tag)
    {
        Permission::create([
            'name' => $name,
            'tag' => "CREATE_{$tag}"
        ]);

        Permission::create([
            'name' => $name,
            'tag' => "SHOW_{$tag}"
        ]);

        Permission::create([
            'name' => $name,
            'tag' => "UPDATE_{$tag}"
        ]);

        Permission::create([
            'name' => $name,
            'tag' => "DELETE_{$tag}"
        ]);
    }
}
