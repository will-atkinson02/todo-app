<?php 

class User {
    private int $id;
    private string $username;
    private string $password; 

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}