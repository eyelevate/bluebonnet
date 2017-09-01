<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'size' => 6,
            'name' => '6mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 6.5,
            'name' => '6.5mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7,
            'name' => '7mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7.5,
            'name' => '7.5mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8,
            'name' => '8mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8.5,
            'name' => '8.5mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9,
            'name' => '9mm',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }
}
