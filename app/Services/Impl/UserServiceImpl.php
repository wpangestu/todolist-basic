<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private array $users = [
        'wpangestu' => 'rahasia'
    ];

    function login(string $username, string $password): bool
    {
        if(!isset($this->users[$username])){
            return false;
        }

        $correctPassword = $this->users[$username];
        return $password == $correctPassword;
    }
}
