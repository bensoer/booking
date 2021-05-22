<?php


namespace App\Domain\User\Repository;


class UserRespository
{
    protected $TABLE_NAME = "users";
    protected $ALL_TABLE_COLUMNS = [
        "id",
        "guid",
        "firstname",
        "lastname",
        "email",
        "password",
        "about",
        "phone"
    ];
}