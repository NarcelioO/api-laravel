<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_unauthenticated_user_gets_401_and_message(): void
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(401)
                 ->assertJson([
                     'message' => 'Unauthenticated.'
                 ]);
    }
}
