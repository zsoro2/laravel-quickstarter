<?php

namespace Tests\Feature\app\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_login_with_right_credentials()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'password' => bcrypt('asdasdasdasd')
        ]);

        $response = $this->json('POST', '/api/login', [
            'password' => 'asdasdasdasd',
            'email' => $user->email
        ]);

        $response->assertStatus(200);
    }
}
