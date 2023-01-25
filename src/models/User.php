<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $group;

    public function __construct(
        string $id,
        string $username,
        string $email,
        string $password,
        string $group
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->group = $group;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setSetUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setSetGroup(string $group): void
    {
        $this->group = $group;
    }
}