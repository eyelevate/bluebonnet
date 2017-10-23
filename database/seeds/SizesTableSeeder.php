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
        // Round Cut
        DB::table('sizes')->insert([
            'size' => 6.5,
            'carat' => 1,
            
            'name' => '6.5mm (1 ct Diamond Equivalent Weight)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7,
            'carat' => 1.25,
            
            'name' => '7mm (1.25 ct Diamond Equivalent Weight)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7.5,
            'carat' => 1.5,
            
            'name' => '7.5mm (1.5 ct Diamond Equivalent Weight)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8,
            'carat' => 2,
            
            'name' => '8mm (2 ct Diamond Equivalent Weight)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9,
            'carat' => 2.75,
            
            'name' => '9mm (2.75 ct Diamond Equivalent Weight)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        



    }
}
