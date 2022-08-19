<?php

namespace Tests\Feature\Auth;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $user = Teacher::factory()->create();

        $response = $this->actingAs($user,'teachers')->get('/teacher/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $user = Teacher::factory()->create();

        $response = $this->actingAs($user,'teachers')->post('/teacher/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $user = Teacher::factory()->create();

        $response = $this->actingAs($user,'teachers')->post('/teacher/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
