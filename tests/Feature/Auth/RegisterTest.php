<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\HasApiTokens;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    use HasApiTokens;

    public function test_user_can_make_register_with_validates_datas(): void
    {

        $response = $this->postJson('/api/auth/register',[
            'name' => 'test user',
            'email' => 'test@email.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);

    }
}
