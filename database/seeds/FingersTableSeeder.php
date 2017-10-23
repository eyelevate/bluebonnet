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
            'name' => 'Size 4 1/4 ( 1-7/8 in. | 47.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 4.5,
            'name' => 'Size 4 1/2 ( 1-7/8 in. | 47.8mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 4.625,
        //     'name' => 'Size 4 5/8 ( 1-7/8 in. | 48.1mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        DB::table('fingers')->insert([
            'size' => 4.75,
            'name' => 'Size 4 3/4 ( 1-15/16 in. | 48.4mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 5,
            'name' => 'Size 5 ( 1-15/16 in. | 49mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 5.125,
        //     'name' => 'Size 5 1/8 ( 1-15/16 in. | 49.3mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        DB::table('fingers')->insert([
            'size' => 5.25,
            'name' => 'Size 5 1/4 ( 1-15/16 in. | 49.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 5.375,
        //     'name' => 'Size 5 3/8 ( 2 in. | 49.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        DB::table('fingers')->insert([
            'size' => 5.5,
            'name' => 'Size 5 1/2 ( 2 in. | 50.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 5.75,
            'name' => 'Size 5 3/4 ( 2 in. | 50.9mm )',
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
            'size' => 6.25,
            'name' => 'Size 6 1/4 ( 2-1/16 in. | 51.5mm )',
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
            'size' => 6.75,
            'name' => 'Size 6 3/4 ( 2-1/8 in. | 53.4mm )',
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
            'size' => 7.25,
            'name' => 'Size 7 1/4 ( 2-1/8 in. | 54.7mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 7.5,
            'name' => 'Size 7 1/2 ( 2-1/4 in. | 55.3mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 7.75,
            'name' => 'Size 7 3/4 ( 2-3/16 in. | 55.9mm )',
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
            'size' => 8.25,
            'name' => 'Size 8 1/4 ( 2-1/4 in. | 57.2mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('fingers')->insert([
            'size' => 8.5,
            'name' => 'Size 8 1/2 ( 2-3/8 in. | 57.6mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 8.625,
        //     'name' => 'Size 8 5/8 ( 2-5/16 in. | 58.1mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        DB::table('fingers')->insert([
            'size' => 8.75,
            'name' => 'Size 8 3/4 ( 2-5/16 in. | 58.4mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 8.875,
        //     'name' => 'Size 8 7/8 ( 2-5/16 in. | 58.7mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        DB::table('fingers')->insert([
            'size' => 9,
            'name' => 'Size 9 ( 2-5/16 in. | 59.1mm )',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.125,
        //     'name' => 'Size 9 1/8 ( 2-5/16 in. | 59.4mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.25,
        //     'name' => 'Size 9 1/4 ( 2-3/8 in. | 59.7mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.375,
        //     'name' => 'Size 9 3/8 ( 2-3/8 in. | 60mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.5,
        //     'name' => 'Size 9 1/2 ( 2-1/2 in. | 60.3mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.625,
        //     'name' => 'Size 9 5/8 ( 2-3/8 in. | 60.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 9.75,
        //     'name' => 'Size 9 3/4 ( 2-3/8 in. | 60.9mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 10,
        //     'name' => 'Size 10 ( 2-7/16 in. | 61.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 10.25,
        //     'name' => 'Size 10 1/4 ( 2-7/16 in. | 62.2mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 10.5,
        //     'name' => 'Size 10 1/2 ( 2-1/2 in. | 62.8mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 10.625,
        //     'name' => 'Size 10 5/8 ( 2-1/2 in. | 63.1mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 10.75,
        //     'name' => 'Size 10 3/4 ( 2-1/2 in. | 63.5mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11,
        //     'name' => 'Size 11 ( 2-1/2 in. | 64.1mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.125,
        //     'name' => 'Size 11 1/8 ( 2-1/2 in. | 64.4mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.25,
        //     'name' => 'Size 11 1/4 ( 2-9/16 in. | 64.7mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.375,
        //     'name' => 'Size 11 3/8 ( 2-9/16 in. | 65mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.5,
        //     'name' => 'Size 11 1/2 ( 2-9/16 in. | 65.3mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.625,
        //     'name' => 'Size 11 5/8 ( 2-9/16 in. | 65.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.75,
        //     'name' => 'Size 11 3/4 ( 2-5/8 in. | 66mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 11.875,
        //     'name' => 'Size 11 7/8 ( 2-5/8 in. | 66.3mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 12,
        //     'name' => 'Size 12 ( 2-5/8 in. | 66.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 12.25,
        //     'name' => 'Size 12 1/4 ( 2-5/8 in. | 67.2mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 12.5,
        //     'name' => 'Size 12 1/2 ( 2-11/16 in. | 67.9mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 12.75,
        //     'name' => 'Size 12 3/4 ( 2-11/16 in. | 68.5mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 13,
        //     'name' => 'Size 13 ( 2-3/4 in. | 69.1mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 13.25,
        //     'name' => 'Size 13 1/4 ( 2-3/4 in. | 70.7mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 13.5,
        //     'name' => 'Size 13 1/2 ( 2-13.16 in. | 71.3mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 13.75,
        //     'name' => 'Size 13 3/4 ( 2-13/16 in. | 72mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        // DB::table('fingers')->insert([
        //     'size' => 14,
        //     'name' => 'Size 14 ( 2-7/8 in. | 72.6mm )',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
         
    }
}
