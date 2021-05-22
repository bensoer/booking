<?php


namespace App\Domain\User\Service;

use App\Domain\User\Repository\GetUserRespository;
use App\Domain\User\Data\User;
use App\Domain\User\UserNotFoundException;

class GetUserService
{

    private $repository;

    public function __construct(GetUserRespository $repository)
    {
        $this->repository = $repository;
    }

    public function getUser(string $guid): User{

        $userData = $this->repository->getUser($guid);

        if(count($userData) === 0){
            throw new UserNotFoundException();
        }

        $userRow = $userData[0];

        //  - Create Object
        $user = new User(
            $userRow["id"],
            $userRow["guid"],
            $userRow["email"],
            $userRow["password"],
            $userRow["firstName"],
            $userRow["lastName"],
            $userRow["about"],
            $userRow["phone"]
        );

        return $user;

    }
}