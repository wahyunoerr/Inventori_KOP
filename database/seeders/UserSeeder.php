<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'admin' => [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123')
            ],
            'ketua' => [
                'name' => 'ketua test',
                'email' => 'ketua@gmail.com',
                'password' => Hash::make('ketua123')
            ],
        ];

        foreach ($user as $key => $userRole) {
            $createUser = User::create($userRole);

            if ($key === 'admin') {
                $createUser->assignRole(Role::where('name', 'admin')->first());
            }
            if ($key === 'ketua') {
                $createUser->assignRole(Role::where('name', 'ketua')->first());
            }
        }
    }
}
