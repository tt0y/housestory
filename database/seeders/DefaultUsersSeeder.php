<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'admin@chozadom.ru',
            'email'             => 'admin@chozadom.ru',
            'password'          => Hash::make(env('DEFAULT_ADMIN_PASS')),
            'registered_at' => now(),
        ]);
    }
}
