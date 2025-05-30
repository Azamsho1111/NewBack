<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
            'name' => 'admin',
        ], [
            'password' => Hash::make('admin123'),
        ]);
        $adminRole = Role::where('name', 'Admin')->first();
        if ($adminRole && !$admin->roles()->where('role_id', $adminRole->id)->exists()) {
            $admin->roles()->attach($adminRole->id);
        }

        // Moderator user
        $moder = User::firstOrCreate([
            'email' => 'moderator@example.com',
            'name' => 'moderator',
        ], [
            'password' => Hash::make('moder123'),
        ]);
        $moderRole = Role::where('name', 'Moderator')->first();
        if ($moderRole && !$moder->roles()->where('role_id', $moderRole->id)->exists()) {
            $moder->roles()->attach($moderRole->id);
        }
    }
}
