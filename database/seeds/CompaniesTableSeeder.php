<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => "Freya's Fine Jewelry",
            'nick_name' => '',
            'street' => '5550 LBJ Freeway',
            'suite' => '420',
            'city' => 'Dallas',
            'state' => 'TX',
            'country' => 'US',
            'zipcode' => '75240',
            'phone' => '6824723039',
            'phone_option' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
