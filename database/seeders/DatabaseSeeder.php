<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use App\Models\{Article, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'awirhosein',
            'email' => 'awirhosein@yahoo.com',
            'role' => Role::ADMIN
        ]);

        User::factory(10)->create();
        Article::factory(10)->create();
    }
}
