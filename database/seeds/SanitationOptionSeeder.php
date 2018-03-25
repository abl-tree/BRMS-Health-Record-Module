<?php

use Illuminate\Database\Seeder;

class SanitationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sanitation_options')->insert(array (
			0 => array (
                'option' => 'Community water system',
				'sanitation_type_id' => 1
            ),
			1 => array (
                'option' => 'Developed spring',
				'sanitation_type_id' => 1
            ),
			2 => array (
                'option' => 'Protected Well',
				'sanitation_type_id' => 1
            ),
			3 => array (
                'option' => 'Truck/tanker peddler',
				'sanitation_type_id' => 1
            ),
			4 => array (
                'option' => 'Bottled water',
				'sanitation_type_id' => 1
            ),
			5 => array (
                'option' => 'Undeveloped spring',
				'sanitation_type_id' => 1
            ),
			6 => array (
                'option' => 'Unprotected well',
				'sanitation_type_id' => 1
            ),
			7 => array (
                'option' => 'Rainwater',
				'sanitation_type_id' => 1
            ),
			8 => array (
                'option' => 'River, stream, or dam',
				'sanitation_type_id' => 1
            ),
			9 => array (
                'option' => 'Water sealed/flush toilet',
				'sanitation_type_id' => 2
            ),
			10 => array (
                'option' => 'Closed pit privy',
				'sanitation_type_id' => 2
            ),
			11 => array (
                'option' => 'Communal Toilet',
				'sanitation_type_id' => 2
            ),
			12 => array (
                'option' => 'Drop/overhung',
				'sanitation_type_id' => 2
            ),
			13 => array (
                'option' => 'Field/body of water',
				'sanitation_type_id' => 2
            ),
			14 => array (
                'option' => 'No toilet',
				'sanitation_type_id' => 2
            ),
			15 => array (
                'option' => 'Others',
				'sanitation_type_id' => 2
            ),
			16 => array (
                'option' => 'yes',
				'sanitation_type_id' => 3
            ),
			17 => array (
                'option' => 'no',
				'sanitation_type_id' => 3
            ),
        ));
    }
}
