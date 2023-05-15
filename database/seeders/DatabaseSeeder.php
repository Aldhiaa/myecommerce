<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    
    {   
        
        // $this->call([userSeeder::class]);
        // User::factory(9)->create();

         \App\Models\User::factory(9)->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'photo' => fake()->imageUrl('60','60'),
            'role' => fake()->randomElement(['admin','user']),
            'status' => fake()->randomElement(['ative','inactive']),
        ]);
    }
}
