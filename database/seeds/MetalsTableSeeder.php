<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MetalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metals')->insert([
            'name' => '14K White',
            'desc' => 'Gold',
            'price' => 500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('metals')->insert([
            'name' => '14K Rose',
            'desc' => 'Gold',
            'price' => 500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
       	DB::table('metals')->insert([
            'name' => '14K Yellow',
            'desc' => 'Gold',
            'price' => 500.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('metals')->insert([
            'name' => '18K White',
            'desc' => 'Gold',
            'price' => 1000.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('metals')->insert([
            'name' => '18K Rose',
            'desc' => 'Gold',
            'price' => 1000.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
       	DB::table('metals')->insert([
            'name' => '18K Yellow',
            'desc' => 'Gold',
            'price' => 1000.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('metals')->insert([
            'name' => 'Platinum',
            'desc' => 'Rare',
            'price' => 5000.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
