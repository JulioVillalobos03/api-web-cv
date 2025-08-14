<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private const EMAIL_DEMO = 'demo@cvapp.test';

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => self::EMAIL_DEMO],
            [
                'name' => 'Usuario Demo',
                'password' => Hash::make('secret123'),
            ]
        );
    }
}

