<?php

namespace dwes\app\entity;

use dwes\app\entity\IEntity;

require_once 'IEntity.php';

class Usuario implements IEntity
{
    private $id;
    private $username;
    private $password;
    private $role;

    public function __construct($username = "", $password = "", $role = "")
    {
        $this->id = null;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $role;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'role' => $this->getRole(),
        ];
    }
}
