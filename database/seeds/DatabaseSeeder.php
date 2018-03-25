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
        $this->call('CountryTableSeeder');
        $this->call('ProvincesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('SanitationTypesSeeder');
        $this->call('SanitationOptionSeeder');
    }
}
