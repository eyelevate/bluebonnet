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
            'size' => 0.8,
            'carat' => 0.0025,
            
            'name' => '0.8mm (0.0025 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1,
            'carat' => 0.005,
            
            'name' => '1mm (0.005 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.15,
            'carat' => 0.0067,
            
            'name' => '1.15mm (0.0067 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.20,
            'carat' => 0.0075,
            
            'name' => '1.20mm (0.0075 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.25,
            'carat' => 0.01,
            
            'name' => '1.25mm (0.01 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.3,
            'carat' => 0.01,
            
            'name' => '1.3mm (0.01 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.5,
            'carat' => 0.015,
            
            'name' => '1.5mm (0.015 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.75,
            'carat' => 0.02,
            
            'name' => '1.75mm (0.02 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 1.8,
            'carat' => 0.025,
            'name' => '1.8mm (0.025 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 2,
            'carat' => 0.03,
            
            'name' => '2mm (0.03 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 2.25,
            'carat' => 0.04,
            
            'name' => '2.25mm (0.04 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 2.5,
            'carat' => 0.06,
            
            'name' => '2.5mm (0.06 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 2.75,
            'carat' => 0.08,
            
            'name' => '2.75mm (0.08 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 3,
            'carat' => 0.11,
            
            'name' => '3mm (0.11 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 3.25,
            'carat' => 0.14,
            
            'name' => '3.25mm (0.14 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 3.5,
            'carat' => 0.17,
            
            'name' => '3.5mm (0.17 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 3.75,
            'carat' => 0.21,
            
            'name' => '3.75mm (0.21 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 4,
            'carat' => 0.25,
            
            'name' => '4mm (0.25 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 4.25,
            'carat' => 0.28,
            
            'name' => '4.25mm (0.28 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 4.5,
            'carat' => 0.36,
            
            'name' => '4.5mm (0.36 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 4.75,
            'carat' => 0.44,
            
            'name' => '4.75mm (0.44 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sizes')->insert([
            'size' => 5,
            'carat' => 0.50,
            
            'name' => '5mm (0.50 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 5.25,
            'carat' => 0.56,
            
            'name' => '5.25mm (0.56 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 5.5,
            'carat' => 0.66,
            
            'name' => '5.5mm (0.66 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 5.75,
            'carat' => 0.75,
            
            'name' => '5.75mm (0.75 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 6,
            'carat' => 0.84,
            
            'name' => '6mm (0.84 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 6.25,
            'carat' => 0.93,
            
            'name' => '6.25mm (0.93 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 6.5,
            'carat' => 1,
            
            'name' => '6.5mm (1 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 6.8,
            'carat' => 1.25,
            
            'name' => '6.8mm (1.25 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7,
            'carat' => 1.30,
            
            'name' => '7mm (1.30 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sizes')->insert([
            'size' => 7.3,
            'carat' => 1.50,
            
            'name' => '7.3mm (1.5 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7.5,
            'carat' => 1.67,
            
            'name' => '7.5mm (1.67 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 7.75,
            'carat' => 1.75,
            
            'name' => '7.75mm (1.75 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8,
            'carat' => 2,
            
            'name' => '8mm (2 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8.25,
            'carat' => 2.11,
            
            'name' => '8.25mm (2.11 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8.5,
            'carat' => 2.43,
            
            'name' => '8.5mm (2.43 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 8.7,
            'carat' => 2.5,
            
            'name' => '8.7mm (2.5 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9,
            'carat' => 2.75,
            
            'name' => '9mm (2.75 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9.1,
            'carat' => 3,
            
            'name' => '9.1mm (3 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9.5,
            'carat' => 3.35,
            
            'name' => '9.5mm (3.35 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 9.75,
            'carat' => 3.61,
            
            'name' => '9.75mm (3.61 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 10,
            'carat' => 3.87,
            
            'name' => '10mm (3.87 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 10.25,
            'carat' => 4.16,
            
            'name' => '10.25mm (4.16 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 10.5,
            'carat' => 4.41,
            
            'name' => '10.5mm (4.41 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 10.75,
            'carat' => 4.57,
            
            'name' => '10.75mm (4.57 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 11,
            'carat' => 4.91,
            
            'name' => '11mm (4.91 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 11.25,
            'carat' => 5.49,
            
            'name' => '11.25mm (5.49 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 11.5,
            'carat' => 5.85,
            
            'name' => '11.5mm (5.85 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 12,
            'carat' => 6.84,
            
            'name' => '12mm (6.84 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 12.25,
            'carat' => 7.26,
            
            'name' => '12.25mm (7.26 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 12.5,
            'carat' => 7.36,
            
            'name' => '12.5mm (7.36 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 12.75,
            'carat' => 7.52,
            
            'name' => '12.75mm (7.52 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 13,
            'carat' => 8.51,
            
            'name' => '13mm (8.51 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 13.5,
            'carat' => 9.53,
            
            'name' => '13.5mm (9.53 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 14,
            'carat' => 10.49,
            'name' => '14mm (10.49 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 15,
            'carat' => 12.89,
            'name' => '15mm (12.89 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'size' => 16,
            'carat' => 16.06,
            'name' => '16mm (16.06 ct)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



    }
}
