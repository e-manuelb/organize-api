<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTypesToStoreTypes extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Eletronics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobility', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'House', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Taxes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('store_types')->insert($types);
    }
}
