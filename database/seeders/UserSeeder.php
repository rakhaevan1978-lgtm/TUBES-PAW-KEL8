<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Yafa',
                'email' => 'yafa@envystudio.id',
                'password' => Hash::make('envy2026'),
                'role' => User::ROLE_OWNER,
                'style_specializations' => ['Manajemen & QC'],
                'is_active' => true,
            ],
            [
                'name' => 'Ael',
                'email' => 'ael@envystudio.id',
                'password' => Hash::make('envy2026'),
                'role' => User::ROLE_DESAINER,
                'style_specializations' => ['Poster & Banner', 'Desain Jersey', 'Thumbnail'],
                'is_active' => true,
            ],
            [
                'name' => 'Farhan',
                'email' => 'farhan@envystudio.id',
                'password' => Hash::make('envy2026'),
                'role' => User::ROLE_DESAINER,
                'style_specializations' => ['Logo Esports', 'Mascot'],
                'is_active' => true,
            ],
            [
                'name' => 'Raka',
                'email' => 'raka@envystudio.id',
                'password' => Hash::make('envy2026'),
                'role' => User::ROLE_DESAINER,
                'style_specializations' => ['Overlay Streamer', 'Thumbnail'],
                'is_active' => false,
            ],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                $account
            );
        }
    }
}
