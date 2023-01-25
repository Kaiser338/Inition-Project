<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;


    public function __construct(
        string $id,
        string $task_name,
        string $task_description,
        string $task_date,
        string $task_done
    ) {
        $this->id = $id;
        $this->task_name = $task_name;
        $this->task_description = $task_description;
        $this->task_date = $task_date;
        $this->task_done = $task_done;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->username;
    }

    public function setName(string $username): void
    {
        $this->username = $username;
    }


}