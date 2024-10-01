<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slotmemoria;

class SlotmemoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slotmemoria::create([
            'cantidad' => '1'
        ]);
        Slotmemoria::create([
            'cantidad' => '2'
        ]);
        Slotmemoria::create([
            'cantidad' => '3'
        ]);
        Slotmemoria::create([
            'cantidad' => '4'
        ]);
        Slotmemoria::create([
            'cantidad' => '5'
        ]);
        Slotmemoria::create([
            'cantidad' => '6'
        ]);
       

    }
}
