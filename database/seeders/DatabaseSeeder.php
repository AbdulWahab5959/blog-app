<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users with specific details
        $users = User::factory()
            ->count(10)
            ->sequence(fn ($sequence) => [
                'name'  => 'Test User ' . ($sequence->index + 1),
                'email' => 'test' . ($sequence->index + 1) . '@example.com',
                'age' => rand(18, 65),
            ])
            ->create();
        
        // Call ArticleSeeder and pass the users
        $this->callWith(ArticleSeeder::class, ['users' => $users]);
    }
}