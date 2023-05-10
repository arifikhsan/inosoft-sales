<?php

namespace App\Service;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserService
{

    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }


    public function create($attributes) {
        return $this->userRepository->create($attributes);
    }
}
