<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    protected User $user;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->user = User::factory()->create();
    }
    
    public function test_deleting_note()
    {
        $note = Note::factory()->create();

        $this->actingAs($this->user)->deleteJson(route('notes_delete', ['note' => $note]))->assertStatus(
            Response::HTTP_FOUND
        );

        $this->assertDeleted($note);
    }

    public function test_creating_note()
    {
        $fields = [
            'title' => $this->faker->title,
            'body' => $this->faker->text,
            'is_important' => $this->faker->boolean,
        ];

        $this->actingAs($this->user)->postJson(route('notes_store'), $fields);


        $this->assertDatabaseHas(with(new Note)->getTable(), $fields);
    }

}
