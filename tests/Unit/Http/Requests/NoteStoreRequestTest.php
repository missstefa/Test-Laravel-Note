<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\NoteStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class NoteStoreRequestTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_should_not_authorize_the_request_if_the_user_is_not_logged_in()
    {
        Auth::shouldReceive('check')
            ->once()
            ->andReturn(false);

        $request = new NoteStoreRequest();

        $this->assertFalse($request->authorize());
    }

    public function test_should_authorize_the_request_if_the_user_is_logged_in()
    {
        Auth::shouldReceive('check')
            ->once()
            ->andReturn(true);

        $request = new NoteStoreRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_should_contain_all_the_expected_validation_rules()
    {
        $request = new NoteStoreRequest();

        $this->assertEquals(
            [
                'title' => ['required', 'string', 'max:50'],
                'body' => ['string'],
                'is_important' => ['bool'],
            ],
            $request->rules()
        );
    }

    public function test_should_fail_validation_if_the_title_is_not_provided()
    {
        $request = new NoteStoreRequest();

        $validator = Validator::make(
            [
                'body' => 'this is a test',
            ],
            $request->rules()
        );

        $this->assertFalse($validator->passes());
        $this->assertContains('title', $validator->errors()->keys());
    }

    public function test_valid_data()
    {
        $dates = [
            [
                'title' => $this->faker->word(),
            ],
            [
                'title' => $this->faker->word(),
                'body' => $this->faker->word(),
            ],
            [
                'title' => $this->faker->word(),
                'body' => $this->faker->paragraph(),
                'is_important' => $this->faker->boolean(),
            ],
        ];
        $request = new NoteStoreRequest();
        foreach ($dates as $data) {


            $validator = Validator::make($data, $request->rules());

            $this->assertTrue($validator->passes());
        }
    }


//    /** @test */
//    public function test()
//    {
//        $response = $this->actingAs($this->user)
//            ->postJson(
//                route('products.store'),
//                [
//                    'price' => $this->faker->numberBetween(1, 50),
//                ]
//            );
//
//        $response > assertStatus(
//            Response::HTTP_UNPROCESSABLE_ENTITY
//        );
//
//        $response->assertJsonValidationErrors('title');
//    }
}
