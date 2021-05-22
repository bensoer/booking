<?php
declare(strict_types=1);

namespace App\Domain\User\Data;

use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $guid;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $about;

    /**
     * var string
     */
    private $phone;

    /**
     * @param int|null  $id
     * @param string    $guid
     * @param string    $email
     * @param string    $firstName
     * @param string    $lastName
     * @param string    $about
     * @param string    $phone
     */
    public function __construct(
        ?int $id,
        ?string $guid,
        string $email,
        string $password,
        string $firstName,
        string $lastName,
        string $about,
        string $phone

    )
    {
        $this->id = $id;
        $this->guid = $guid;
        $this->email = strtolower($email);
        $this->password = $password;
        $this->about = $about;
        $this->phone = $phone;
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);

    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            //'id' => $this->id,
            'guid' => $this->guid,
            'email' => $this->email,
            //'password' => $this->password, - password shouldn't leave the object
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'about' => $this->about,
            'phone' => $this->phone
        ];
    }
}
