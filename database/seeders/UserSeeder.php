<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        collect([
            [
                'name' => 'miigo',
                'email' => 'miigo@duck.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'HMM',
                'email' => 'hmmm@duck.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ],
        ])->each(fn($q) => User::create($q));
    }
}
