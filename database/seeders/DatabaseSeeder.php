<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CustomerSeeder::class,
            RoleSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);

        // We will seed 10 employees
        User::factory()->count(10)->create([
            'role_id' => Role::where('name', 'Employee')->first()->id,
        ]);
    }
}
