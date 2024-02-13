<?php

namespace Database\Seeders;

use App\Models\Synthetiser;
use Database\Factories\SynthetiserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SynthetiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Synthetiser::factory(500)->create();
    }
}
