<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Axel',
            'email' => 'axel@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make("Password1"),
            'remember_token' => Str::random(10),
            'is_admin' => '1',
        ]);
        User::create([
            'name' => 'Aaron',
            'email' => 'aaron@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make("Password1"),
            'remember_token' => Str::random(10),
            'is_admin' => '1',
        ]);

        User::factory()
            ->count(20)
            ->create();
    }
}
