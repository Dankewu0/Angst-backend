<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> fc2cd7fe379a1017e1f3cd81ca69750b3e2a146a
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    use WithoutModelEvents;
=======
>>>>>>> fc2cd7fe379a1017e1f3cd81ca69750b3e2a146a

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
=======
        $this->call(RoleSeeder::class);
>>>>>>> fc2cd7fe379a1017e1f3cd81ca69750b3e2a146a
    }
}
