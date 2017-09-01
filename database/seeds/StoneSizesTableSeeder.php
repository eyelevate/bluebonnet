<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StoneSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stone_sizes')->insert([
            'size_id' => 1,
            'stone_id' => 1,
            'price' => 100.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 2,
            'stone_id' => 1,
            'price' => 200.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 3,
            'stone_id' => 1,
            'price' => 300.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 4,
            'stone_id' => 1,
            'price' => 400.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 5,
            'stone_id' => 1,
            'price' => 500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 6,
            'stone_id' => 1,
            'price' => 600.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 7,
            'stone_id' => 1,
            'price' => 700.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 1,
            'stone_id' => 2,
            'price' => 200.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 2,
            'stone_id' => 2,
            'price' => 400.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 3,
            'stone_id' => 2,
            'price' => 600.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 4,
            'stone_id' => 2,
            'price' => 800.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 5,
            'stone_id' => 2,
            'price' => 1000.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 6,
            'stone_id' => 2,
            'price' => 1200.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 7,
            'stone_id' => 2,
            'price' => 1400.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
