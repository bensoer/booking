<?php

namespace App\Application\Helpers;

class PasswordHelper
{

    public static function hashPassword(string $password):string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}