<?php

namespace Database\Seeders;

use App\Models\Article;
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
        $user = User::factory()->create(
            [
                'name' => 'Stefa',
                'email' => 'miss.stefa@yandex.ru',
                'password' => Hash::make('s25088888'),
            ]
        );

        Note::factory(5)->has(User::factory())->create();
        Article::factory(3)->has(User::factory())->create();

        $notes = Note::factory(10)->create();
        $articles =  Article::factory(5)->create();

        $user->notes()->sync($notes);
        $user->articles()->sync($articles);
    }
}

