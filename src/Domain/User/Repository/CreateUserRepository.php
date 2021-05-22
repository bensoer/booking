<?php

namespace App\Domain\User\Repository;

use Medoo\Medoo;
use \App\Domain\User\User;

class CreateUserRepository extends UserRespository
{

    private $connection;

    public function __construct(Medoo $connection)
    {
        $this->connection = $connection;
    }

    public function insertUser(User $user): int
    {
        $this->connection->insert(
            $this->TABLE_NAME,
            $user->jsonSerialize()
        );

        return $this->connection->id();
    }

}