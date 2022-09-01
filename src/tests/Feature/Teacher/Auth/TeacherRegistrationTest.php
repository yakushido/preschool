<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Teacher;
use App\Models\Admin;

class TeacherRegistrationTest extends TestCase
{
    use RefreshDatabase;


    public function test_new_users_can_register()
    {
        $user = Admin::factory()->create();

        $new_user = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'team_id' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->actingAs($user,'admins')
            ->post('/teacher/register', $new_user);

        $read_user = Teacher::where('name','Test User')->first();
        $this->assertNotNull($read_user);
        $this->assertTrue(\Hash::check('password', $read_user->password));
    }
}
