<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BucketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("buckets")->insert([
            'name' => 'my bucket',
            'location' => '1',
        ]);
    }
}
