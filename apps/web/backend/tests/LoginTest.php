<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase
{
    public function testAccessGranted()
    {
        $url    = 'http://localhost:8000/login.php';
        $fields = [
            'email'    => "pepe@pepe.com",
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
        $this->assertStringContainsString('Access granted', $result);
    }

    public function testAccessNotGranted()
    {
        $url    = 'http://localhost:8000/login.php';
        $fields = [
            'email'    => "pepe@pepe.com",
            'password' => "12345"
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
        $this->assertStringContainsString('Access denied', $result);
    }
}
