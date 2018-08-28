<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Sample data category 1
        DB::table('categories')->insert([
            'kod' => 'A',
            'nama' => 'SEWA',
        ]);

        # Sample data category 1
        DB::table('categories')->insert([
            'kod' => 'B',
            'nama' => 'PERNIAGAAN',
        ]);

        # Sample data category 1
        DB::table('categories')->insert([
            'kod' => 'C',
            'nama' => 'UMUM',
        ]);
    }
}
