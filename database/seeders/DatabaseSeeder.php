<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Setting::create(['title' => 'CMS']);

        User::factory()->create([
            'name' => 'Sok',
            'role_id' => 1,
            'password' => bcrypt('12345678'),
            'email' => 'admin@gmail.com',
            'is_supperadmin' =>1,
        ]);
    }
}
