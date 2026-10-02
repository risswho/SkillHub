<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessControlTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_explore_and_redirects_to_login(): void
    {
        $response = $this->get('/explore');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_profile_and_redirects_to_login(): void
    {
        $response = $this->get('/profile');
        $response->assertRedirect('/login');
    }

    public function test_guest_can_access_home_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_user_can_access_explore(): void
    {
        $user = User::create([
            'username' => 'testuser_ac',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $response = $this->withSession([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
        ])->get('/explore');

        $response->assertStatus(200);
    }

    public function test_user_cannot_access_admin_dashboard_and_gets_forbidden(): void
    {
        $user = User::create([
            'username' => 'testuser_ac',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $response = $this->withSession([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
        ])->get('/admin/dashboard');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $admin = User::create([
            'username' => 'testadmin_ac',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $response = $this->withSession([
            'user_id' => $admin->id,
            'username' => $admin->username,
            'role' => $admin->role,
        ])->get('/admin/dashboard');

        $response->assertStatus(200);
    }
}
