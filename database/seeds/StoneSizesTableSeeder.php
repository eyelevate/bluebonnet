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
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 2,
            'stone_id' => 1,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 3,
            'stone_id' => 1,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 4,
            'stone_id' => 1,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 5,
            'stone_id' => 1,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('stone_sizes')->insert([
            'size_id' => 1,
            'stone_id' => 2,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 2,
            'stone_id' => 2,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 3,
            'stone_id' => 2,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 4,
            'stone_id' => 2,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stone_sizes')->insert([
            'size_id' => 5,
            'stone_id' => 2,
            'price' => 0.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

    }
}
