<?php 

declare(strict_types=1);

class StagesModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTaskboardsStages(int $taskboardId): array 
    {
        $query = $this->db->prepare('SELECT `id`, `stage_name`, `taskboard_id` FROM `stages` 
        WHERE `taskboard_id` = :taskboardId');
        $query->setFetchMode(PDO::FETCH_CLASS, Stage::class);
        $query->execute(['taskboardId' => $taskboardId]);
        return $query->fetchAll();
    }

    public function getStageByName(string $stageName): array
    {
        $query = $this->db->prepare('SELECT `id`, `stage_name`, `taskboard_id` FROM `stages` 
        WHERE `stage_name` = :stageName');
        $query->setFetchMode(PDO::FETCH_CLASS, Stage::class);
        $query->execute(['stageName' => $stageName]);
        return $query->fetchAll();
    }

    public function addNewStage(string $stageName, int $taskboardId): bool
    {
        $query = $this->db->prepare('INSERT INTO `stages` (`stage_name`, `taskboard_id`) VALUES (:stageName, :taskboardId)');
        return $query->execute(['stageName' => $stageName, 'taskboardId' => $taskboardId]);
    }  

    public function deleteStage(string $stageName): bool
    {
        $query = $this->db->prepare("DELETE FROM `stages` WHERE `stage_name` = :stageName;");
        return $query->execute(['stageName' => $stageName]);
    }
}