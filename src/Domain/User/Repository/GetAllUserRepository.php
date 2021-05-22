<?php


namespace App\Domain\User\Repository;

use Medoo\Medoo;

class GetAllUserRepository extends UserRespository
{
    private $connection;

    public function __construct(Medoo $connection)
    {
        $this->connection = $connection;
    }

    public function getAllUsers(): array
    {
        return $this->connection->select(
            $this->TABLE_NAME,
            $this->ALL_TABLE_COLUMNS
        );
    }

}