<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_gagal_tanpa_email()
    {
        $response = $this->postJson('/api/login', ['password' => '123']);
        $response->assertStatus(422);
    }

    public function test_login_gagal_tanpa_password()
    {
        $response = $this->postJson('/api/login', ['email' => 'test@example.com']);
        $response->assertStatus(422);
    }

    public function test_login_gagal_kredensial_salah()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'salah@example.com',
            'password' => 'salah'
        ]);
        $response->assertStatus(401);
    }

    public function test_login_berhasil()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);
    }
}
