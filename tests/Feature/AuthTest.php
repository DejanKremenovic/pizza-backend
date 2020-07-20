<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }  

    /**
     * User model
     * 
     */
    protected $user;

    /**
     * Assert that user can successfully login.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        $response->assertStatus(200);
        $responseArray = json_decode($response->getContent());
        $this->assertEquals(true, array_key_exists('token', (array)$responseArray));
    }

    
    /**
     * Assert that user can not login if he did not entered password.
     *
     * @return void
     */
    public function testUserCanNotLoginValidationFail()
    {
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $this->user->email,
            'password' => ''
        ]);
        $response->assertStatus(422);
    }

    /**
     * Assert that user can logout.
     *
     * @return void
     */
    public function testUserCanLogout()
    {
        $response = $this->json('POST', '/api/v1/login', [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        $response->assertStatus(200);
        $responseArray = (array)json_decode($response->getContent());
        $token = $responseArray['token'];
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->json('POST', '/api/v1/logout');

        $response->assertStatus(200);
    }
}
