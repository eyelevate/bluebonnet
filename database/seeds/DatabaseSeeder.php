<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(FingersTableSeeder::class);
        $this->call(MetalsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(StonesTableSeeder::class);
        $this->call(StoneSizesTableSeeder::class);
    }
}
