<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FingersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fingers')->insert([
            'size' => 4,
            'name' => 'Size 4 ( 1-13/16 in. | 46.5mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 4.25,
            'name' => 'Size 4 1/4 ( 1-27/32 in. | 47.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 4.5,
            'name' => 'Size 4 1/2 ( 1-7/8 in. | 47.8mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 5,
            'name' => 'Size 5 ( 1-15/16 in. | 49mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 5.5,
            'name' => 'Size 5 1/2 ( 2 in. | 50.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 6,
            'name' => 'Size 6 ( 2-1/16 in. | 51.5mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 6.5,
            'name' => 'Size 6 1/2 ( 2-1/8 in. | 52.8mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 7,
            'name' => 'Size 7 ( 2-3/16 in. | 54mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 7.5,
            'name' => 'Size 7 1/2 ( 2-1/4 in. | 55.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        //
        DB::table('fingers')->insert([
            'size' => 8,
            'name' => 'Size 8 ( 2-5/16 in. | 56.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 8.5,
            'name' => 'Size 8 1/2 ( 2-3/8 in. | 57.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 9,
            'name' => 'Size 9 ( 2-7/16 in. | 59.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 9.5,
            'name' => 'Size 9 1/2 ( 2-1/2 in. | 60.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 10,
            'name' => 'Size 10 ( 2-9/16 in. | 61.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 10.5,
            'name' => 'Size 10.5 ( 2-5/8 in. | 62.8mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 11,
            'name' => 'Size 11 ( 2-11/16 in. | 64.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 11.5,
            'name' => 'Size 11 1/2 ( 2-3/4 in. | 65.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 12,
            'name' => 'Size 12 ( 2-13/16 in. | 66.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 12.5,
            'name' => 'Size 12 1/2 ( 2-7/8 in. | 67.9mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 13,
            'name' => 'Size 13 ( 2-15/16 in. | 69.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
         
    }
}
