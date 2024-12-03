<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            ['name' => 'sekretaris'],
            ['name' => 'ketua'],
        ];

        foreach ($role as $key) {
            Role::updateOrCreate($key);
        }
    }
}
