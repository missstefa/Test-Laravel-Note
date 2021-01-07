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

        $this->createApplication();

        $this->user = User::factory()->make();
    }

    public function test_deleting_note()
    {
        $note = Note::factory()->create();

        $this->actingAs($this->user)->deleteJson(route('notes.delete', ['note' => $note]))->assertStatus(
            Response::HTTP_FOUND
        )->assertRedirect(route('notes.index'));

        $this->assertDeleted($note);
    }

    public function test_storing_note()
    {
        $fields = [
            'title' => $this->faker->title,
            'body' => $this->faker->text,
            'is_important' => $this->faker->boolean,
        ];

        $this->actingAs($this->user)->postJson(route('notes.store'), $fields)->assertRedirect(route('notes.index'));


        $this->assertDatabaseHas(with(new Note())->getTable(), $fields);
    }

    public function test_updating_note()
    {
        $note = Note::factory()->create();

        $fields = [
            'title' => $this->faker->title,
            'body' => $this->faker->text,
            'is_important' => $this->faker->boolean,
        ];

        $oldFields = [
            'title' => $note->title,
            'body' => $note->body,
            'is_important' => $note->is_important
        ];

        $this->actingAs($this->user)->patchJson(route('notes.update', ['note' => $note]), $fields);

        $this->assertDatabaseMissing(with(new Note())->getTable(), $oldFields);

        $this->assertDatabaseHas(with(new Note())->getTable(), $fields);
    }

    public function test_showing_note()
    {
        $note = Note::factory()->create();

        $response = $this->actingAs($this->user)->getJson(route('notes.show', ['note' => $note]));

        $response->assertViewIs('notes.show');

        $response->assertViewHas('note', $note);

        $response->assertSee('is_important');
        $response->assertSee('title');
        $response->assertSee('body');
    }

}
