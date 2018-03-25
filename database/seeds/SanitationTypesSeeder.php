<?php

use Illuminate\Database\Seeder;

class SanitationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sanitation_types')->insert(array (
			0 => array (
                'id' => 1,
				'description' => 'Sources of Water'
            ),
			1 => array (
                'id' => 2,
				'description' => 'Types of Toilet'
            ),
			2 => array (
                'id' => 3,
				'description' => 'With Blind Drainage'
            )
        ));
    }
}
