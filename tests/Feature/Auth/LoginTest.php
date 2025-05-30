<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_make_login_with_validates_creditials(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
