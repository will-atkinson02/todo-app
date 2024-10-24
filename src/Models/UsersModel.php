<?php

declare(strict_types=1);

class UsersModel {
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this->db = $db;
    }

    public function getAllUsers(): array
    {
        $query = $this->db->prepare('SELECT `id`, `username` FROM `users`;');
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getUserById(int $id): User
    {
        $query = $this->db->prepare('SELECT `id`, `username` FROM `users` WHERE `users`.`id` = :id;');
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function checkUserExists(string $username): User|false
    {
        $query = $this->db->prepare('SELECT `id`, `username`, `password` FROM `users` WHERE `username` = :username;');
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $query->execute(['username' => $username]);
        return $query->fetch();
    }

    public function createUser(string $username, string $password)
    {
        $query = $this->db->prepare('INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)');
        return $query->execute([
            'username' => $username,
            'password' => $password
        ]);
    }
}