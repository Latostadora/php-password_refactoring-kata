<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class RegisterTest extends TestCase
{
    private const EMAIL_TO_REGISTER = 'paco@pepe.com';

    public function testSuccessfulRegistration()
    {
        $url    = 'http://localhost:8000/register.php';
        $fields = [
            'email'    => self::EMAIL_TO_REGISTER,
            'password' => "1234"
        ];

        $fieldsString = null;
        foreach ($fields as $key => $value) {
            $fieldsString .= $key . '=' . $value . '&';
        }
        rtrim($fieldsString, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $this->assertStringContainsString('Successful registration', $result);
    }

    public function testNotSuccessfulRegistration()
    {
        $url    = 'http://localhost:8000/register.php';
        $fields = [
            'email'    => 'pepe@pepe.com',
            'password' => "1234"
        ];

        $fieldsString = null;
        foreach ($fields as $key => $value) {
            $fieldsString .= $key . '=' . $value . '&';
        }
        rtrim($fieldsString, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $this->assertStringContainsString('Unable to register', $result);
    }

    public function tearDown(): void
    {
        $con = require '../../../../libs/DbConnect.php';

        $query = 'DELETE users where email = ?';
        $stmt  = $con->prepare($query);
        $stmt->bindParam(1, self::EMAIL_TO_REGISTER);
        $stmt->execute();
    }
}
