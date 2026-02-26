<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Luiz Felipe Frois Neves',
            'email' => 'luiz@exemplo.com',
            'password' => bcrypt('password'), 
        ]);

        Note::factory(10)->create([
            'user_id' => $admin->id
        ]);

        User::factory(10)->create()->each(function ($user) {
            Note::factory(rand(3, 7))->create([
                'user_id' => $user->id
            ]);
        });
    }
}