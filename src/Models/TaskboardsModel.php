<?php 

declare(strict_types=1);

class TaskboardsModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUsersTaskboards(int $userId): array
    {
        $query = $this->db->prepare('SELECT `id`, `taskboard_name`, `user_id` FROM `taskboards` 
        WHERE `user_id` = :userId');
        $query->setFetchMode(PDO::FETCH_CLASS, Taskboard::class);
        $query->execute(['userId' => $userId]);
        return $query->fetchAll();
    }
}