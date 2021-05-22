<?php


namespace App\Domain\User\Repository;

use App\Domain\User\User;
use Medoo\Medoo;

class GetUserRespository extends UserRespository
{

    private $connection;

    public function __construct(Medoo $connection)
    {
        $this->connection = $connection;
    }

    public function getUser(string $guid): array {

        return $this->connection->select(
            $this->TABLE_NAME,
            $this->ALL_TABLE_COLUMNS,
            [
                "guid" => $guid
            ]
        );
    }
}