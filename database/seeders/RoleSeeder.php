<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'owner']);

        $user = User::firstOrCreate(
            ['email' => 'danke@danke.da'],
            [
                'name' => 'danke',
                'password' => Hash::make('danke'),
            ]
        );

        $user->assignRole('owner');
    }
}
