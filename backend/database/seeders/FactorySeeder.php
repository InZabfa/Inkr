<?php

namespace Database\Seeders;

use Database\Factories\TattooFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TattooFactory::new()->count(10)->create();
    }
}
