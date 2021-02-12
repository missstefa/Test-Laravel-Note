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

        $article =  Article::factory()->create();
        $user->articles()->sync($article);
        $notes = Note::factory(5)->create(['article_id' => $article->id]);
        $user->notes()->sync($notes);
    }
}

