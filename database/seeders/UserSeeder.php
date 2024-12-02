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
            'sekretatis' => [
                'name' => 'sekretaris',
                'email' => 'sekretaris@gmail.com',
                'password' => Hash::make('sekretaris123')
            ],
            'ketua Koperasi' => [
                'name' => 'ketua Koperasi',
                'email' => 'ketua@gmail.com',
                'password' => Hash::make('ketua123')
            ],
        ];

        foreach ($user as $key => $userRole) {
            $createUser = User::create($userRole);

            if ($key === 'sekretatis') {
                $createUser->assignRole(Role::where('name', 'sekretatis')->first());
            }
            if ($key === 'ketua Koperasi') {
                $createUser->assignRole(Role::where('name', 'ketua Koperasi')->first());
            }
        }
    }
}
