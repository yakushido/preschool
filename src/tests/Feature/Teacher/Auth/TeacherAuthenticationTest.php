<?php

namespace Tests\Feature\Auth;

use App\Models\Teacher;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/teacher/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = Teacher::factory()->create();

        $response = $this->post('/teacher/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated($guard = 'teachers');
        $response->assertRedirect(RouteServiceProvider::TEACHER_HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = Teacher::factory()->create();

        $this->post('/teacher/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
