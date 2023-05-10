<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function create($attributes) {
        return User::create($attributes);
    }
}
