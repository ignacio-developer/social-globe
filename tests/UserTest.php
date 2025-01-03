<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/controllers/AuthController.php';

class UserTest extends TestCase
{
    public function testUserRegistrationWithFullDetails()
    {
        $username = 'testuser';
        $password = 'password123';
        $firstName = 'John';
        $lastName = 'Doe';
        $email = 'john.doe@example.com';

        $result = AuthController::register($username, $password, $firstName, $lastName, $email);

        $this->assertTrue($result, "User registration failed.");
    }

    public function testEmailValidation()
    {
        $username = 'testuser2';
        $password = 'password123';
        $firstName = 'Jane';
        $lastName = 'Doe';
        $email = 'invalid-email';

        $result = AuthController::register($username, $password, $firstName, $lastName, $email);

        $this->assertFalse($result, "Invalid email was accepted.");
    }

    public function testUniqueEmailConstraint()
    {
        $username = 'testuser3';
        $password = 'password123';
        $firstName = 'Alice';
        $lastName = 'Smith';
        $email = 'john.doe@example.com'; // Duplicate email

        $result = AuthController::register($username, $password, $firstName, $lastName, $email);

        $this->assertFalse($result, "Duplicate email was accepted.");
    }


    public function testValidateEmail($email)
    {
    	$result = AuthController::validateEmail($email);
    	$this->assertTrue($result, "Invalid Email Accepted");
    }


}
