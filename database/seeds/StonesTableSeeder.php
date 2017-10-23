<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stones')->insert([
            'name' => 'Moissanite Forever One E-F',
            'desc' => 'Colorless VVS Clarity Quality Moissanite',
            'price' => 0.00,
            'email' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stones')->insert([
            'name' => 'Semi Mount',
            'desc' => 'No Center Stone',
            'price' => 0.00,
            'email' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
       	DB::table('stones')->insert([
            'name' => 'Certified Diamond',
            'desc' => 'Contact By Email',
            'price' => 0.00,
            'email' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('stones')->insert([
            'name' => 'Lab Grown Diamond',
            'desc' => 'Contact By Email',
            'price' => 0.00,
            'email' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        
    }
}
