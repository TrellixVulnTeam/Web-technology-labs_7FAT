<?php

namespace App\Entity;

use Core\Entity;

class User extends Entity
{
    private ?int $id;
    private string $login;
    private string $password;

    public function __construct()
    {
        parent::__construct('user', [
            null
        ]);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        if (isset($this->id))
            return $this->id;
        return null;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }



    public function getEntityInfo()
    {
        return [
            'table_name' => 'user',
            'rowsFull' => [
                'id' => $this->getId(),
                'login' => $this->login,
                'password' => $this->password
            ]
        ];
    }
}
