<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_harus_login()
    {
        $response = $this->getJson('/api/dashboard');
        $response->assertStatus(401);
    }

    public function test_dashboard_berhasil()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123')
        ]);

        // Login
        $login = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        $token = $login->json('token');

        // Dashboard
        $response = $this->withHeader('Authorization', "Bearer {$token}")
                        ->getJson('/api/dashboard');

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }
}
