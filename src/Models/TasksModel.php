<?php 

declare(strict_types=1);

class TasksModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getStagesTasks(int $stageId): array
    {
        $query = $this->db->prepare("SELECT `id`, `name`, `description`, `state`, `colour`, `stage_id` AS 'stageId', `date_created` AS 'dateCreated', `due_date` AS 'dueDate' FROM `tasks` 
        WHERE `stage_id` = :stageId");
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Task::class);
        $query->execute(['stageId' => $stageId]);
        return $query->fetchAll();
    }

    public function addNewTask(string $taskName, int $stageId): bool
    {
        $query = $this->db->prepare('INSERT INTO `tasks` (`name`, `stage_id`) VALUES (:stageName, :stageId)');
        return $query->execute(['stageName' => $taskName, 'stageId' => $stageId]);
    }  

    public function deleteTask(string $taskName): bool
    {
        $query = $this->db->prepare("DELETE FROM `tasks` WHERE `name` = :taskName;");
        return $query->execute(['taskName' => $taskName]);
    }
}