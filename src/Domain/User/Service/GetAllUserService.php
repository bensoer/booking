<?php


namespace App\Domain\User\Service;


use App\Application\Helpers\PasswordHelper;
use App\Domain\User\Repository\CreateUserRepository;
use App\Domain\User\Repository\GetAllUserRepository;
use App\Domain\User\Data\User;
use Ramsey\Uuid\Uuid;

class GetAllUserService
{
    private $repository;

    public function __construct(GetAllUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers(): array{

        $usersData = $this->repository->getAllUsers();

        $users = Array();

        foreach($usersData as $userRow){
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

            $users[] = $user;
        }

        return $users;

    }

}