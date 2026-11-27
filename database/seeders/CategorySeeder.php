<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * A kategóriák feltöltése.
     * A sorrend számít: az id-k (1-7) erre épülnek a ProductSeederben (category_id).
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Pizzák',     // 1
            'Gyrosok',    // 2
            'Hot-Dog',    // 3
            'Saláta',     // 4
            'Hamburger',  // 5
            'Üdítő',      // 6
            'Jégkrém',    // 7
        ];

        $now = now();

        foreach ($categories as $name) {
            DB::table('categories')->insert([
                'name'       => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
