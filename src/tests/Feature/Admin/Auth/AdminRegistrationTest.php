<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Admin;

class AdminRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $user = Admin::factory()->create();

        $response = $this->actingAs($user,'admins')
            ->get('/admin/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $user = Admin::factory()->create();

        $new_user = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->actingAs($user,'admins')
            ->post('/admin/register', $new_user);

        $read_user = Admin::where('name','Test User')->first();
        $this->assertNotNull($read_user);
        $this->assertTrue(\Hash::check('password', $read_user->password));

    }
}
