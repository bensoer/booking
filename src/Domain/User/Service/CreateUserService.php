<?php


namespace App\Domain\User\Service;


use App\Application\Helpers\PasswordHelper;
use App\Domain\User\Repository\CreateUserRepository;
use App\Domain\User\Data\User;
use Ramsey\Uuid\Uuid;

class CreateUserService
{
    private $repository;

    public function __construct(CreateUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createUser(array $data): User{

        // do validation
        $this->validate($data);

        // create the User object

        //  - Generate its GUID
        $guid = Uuid::uuid4();
        //  - Hash the password
        $passwordHash = PasswordHelper::hashPassword($data["password"]);
        //  - Create Object
        $user = new User(
            null,
            $guid,
            $data["email"],
            $passwordHash,
            $data["firstName"],
            $data["lastName"],
            $data["about"],
            $data["phone"]
        );

        // insert it
        $id = $this->repository->insertUser($user);
        // retrieve its ID and return
        $user->setId($id);

        return $user;


    }

    private function validate(array $data){

    }
}