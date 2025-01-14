<?php

namespace Database\Seeders;

use App\Models\Transporter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Transporter::factory()->count(10)->create();
    }
}
