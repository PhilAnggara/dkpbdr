<?php

namespace Database\Seeders;

use App\Models\Fintech;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FintechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fintech::create([
            'fintech' => 'Aktivaku'
        ]);
        Fintech::create([
            'fintech' => 'Avantee'
        ]);
        Fintech::create([
            'fintech' => 'Crowdo'
        ]);
        Fintech::create([
            'fintech' => 'Kawan Cicil'
        ]);
        Fintech::create([
            'fintech' => 'ABL'
        ]);
    }
}
