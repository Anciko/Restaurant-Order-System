<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nums = [1,2,3,4,5];
        foreach ($nums as $key => $value) {
            DB::table('tables')->insert([
                'number' => $value
            ]);
        }

    }
}
