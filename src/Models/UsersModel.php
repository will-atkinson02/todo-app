<?php

declare(strict_types=1);

class UsersModel {
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this->db = $db;
    }

    public function getUserById(int $id): User
    {
        $query = $this->db->prepare('SELECT * FROM `users` WHERE `users`.`id` = :id;');
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}