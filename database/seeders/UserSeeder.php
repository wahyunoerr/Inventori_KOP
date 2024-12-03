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
            'sekretaris' => [
                'name' => 'sekretaris',
                'email' => 'sekretaris@gmail.com',
                'password' => Hash::make('sekretaris123')
            ],
            'ketua' => [
                'name' => 'ketua koperasi',
                'email' => 'ketua@gmail.com',
                'password' => Hash::make('ketua123')
            ],
        ];

        foreach ($user as $key => $userRole) {
            $createUser = User::create($userRole);

            if ($key === 'sekretaris') {
                $createUser->assignRole(Role::where('name', 'sekretaris')->first());
            }
            if ($key === 'ketua') {
                $createUser->assignRole(Role::where('name', 'ketua')->first());
            }
        }
    }
}
