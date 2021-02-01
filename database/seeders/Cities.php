<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class Cities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'            => 'Санкт-Петербург',
            'subject_number'  => 78,
            'country_id'      => Country::where('country_code', 'RUS')->first()->id
        ]);

        City::create([
            'name'            => 'Мосва',
            'subject_number'  => 77,
            'country_id'      => Country::where('country_code', 'RUS')->first()->id
        ]);
    }
}
