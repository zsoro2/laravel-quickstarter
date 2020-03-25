<?php

namespace Tests\Feature\app\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('POST', '/api/register', [
            'password' => 'asdasdasdasd',
            'email' => 'test@example.com'
        ]);

        $response->assertStatus(200);
    }
}
