<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUser()
    {
        // Create a mock instance of User
        $userMock = Mockery::mock(User::class);

        // Set the expected behavior of the mock (we expect the user with ID 1)
        $userMock->shouldReceive('find')->with(1)->andReturn(['id' => 1, 'name' => 'John Doe']);

        // Inject the mock instance into the controller
        $userController = new UserController($userMock);

        // Call the getUser method with the mocked User
        $user = $userController->getUser(1);

        // Assertions
        $this->assertEquals(1, $user['id']);
        $this->assertEquals('John Doe', $user['name']);
    }
}
