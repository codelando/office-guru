<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'Acepta mascotas', 'description' => '', 'icon' => 'paw'],
            ['name' => 'Acepta niños', 'description' => '', 'icon' => 'child'],
            ['name' => 'Bebidas', 'description' => '', 'icon' => 'coffee'],
            ['name' => 'Comidas', 'description' => '', 'icon' => 'cutlery'],
            ['name' => 'Enchufes', 'description' => '', 'icon' => 'plug'],
            ['name' => 'Espacio para grupos', 'description' => '', 'icon' => 'users'],
            ['name' => 'Impresiones', 'description' => '', 'icon' => 'print'],
            ['name' => 'Silencioso', 'description' => '', 'icon' => 'volume-down'],
            ['name' => 'Wifi', 'description' => '', 'icon' => 'wifi'],
            ['name' => 'Cierra tarde', 'description' => '', 'icon' => 'clock-o'],
        ];

        App\Service::insert($services);
    }
}
