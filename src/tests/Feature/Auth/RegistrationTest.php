<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Teacher;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_users_can_register()
    {
        $user = Teacher::factory()->create();

        $new_user = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'team_id' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->actingAs($user,'teachers')
            ->post('/register', $new_user);

        $read_user = User::where('name','Test User')->first();
        $this->assertNotNull($read_user);
        $this->assertTrue(\Hash::check('password', $read_user->password));
    }
}
