<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'              => 'Россия',
            'country_code'      => 'RUS',
        ]);
    }
}
