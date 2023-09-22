<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Админ',
                'tech_name' => 'admin'
            ],
            [
                'name' => 'Вебмастер',
                'tech_name' => 'webmaster'
            ],
            [
                'name' => 'Рекламодатель',
                'tech_name' => 'advertiser'
            ]
        ];

        foreach ($roles as $role){
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Иван',
                'email' => 'admin@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'admin')->pluck('id')->first(),
                'confirmed' => true
            ],
            [
                'name' => 'Сергей',
                'email' => 'master@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'webmaster')->pluck('id')->first(),
                'confirmed' => true
            ],
            [
                'name' => 'Алексей',
                'email' => 'adv@email.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => Role::where('tech_name', 'advertiser')->pluck('id')->first(),
                'confirmed' => true
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
