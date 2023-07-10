<?php

namespace App\Services;

interface UserService{

    public function login(string $usrname, string $password):bool;

}