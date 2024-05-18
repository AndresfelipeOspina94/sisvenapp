<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MetodoPagoSeeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\ProveedorSeeder;
use Database\Seeders\ProductoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MetodoPagoSeeder::class,
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
        ]);
    }
}