<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(
            [
                'name' => 'Stefa',
                'email' => 'miss.stefa@yandex.ru',
                'password' => Hash::make('s25088888')
            ]
        );
        User::factory(3)->create();
        Note::factory(15)->create();
    }
}

