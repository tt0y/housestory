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
            'name'              => 'admin@housestory.loc',
            'email'             => 'admin@housestory.loc',
            'password'          => Hash::make(env('DEFAULT_ADMIN_PASS')),
            'email_verified_at' => now(),
        ]);
    }
}
