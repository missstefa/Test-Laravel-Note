<?php

namespace Tests\Feature;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class AuthUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cant_show_all_notes_without_auth()
    {
        $response = $this->get('/notes');

        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function test_cant_create_note_without_auth()
    {
        $response = $this->post('/notes', []);

        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function test_can_show_all_notes_with_auth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/notes');

        $response->assertStatus(Response::HTTP_OK);

    }
}
