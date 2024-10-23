<?php 

declare(strict_types=1);

class StagesModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTaskboardsStages(): array 
    {
        $query = $this->db->prepare('SELECT `id`, `stage_name`, `taskboard_id` FROM `stages` 
        WHERE `taskboard_id` = 1');
        $query->setFetchMode(PDO::FETCH_CLASS, Stage::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function addNewStage(string $stageName): bool
    {
        $query = $this->db->prepare('INSERT INTO `stages` (`stage_name`) VALUES (:stageName)');
        return $query->execute(['stageName' => $stageName]);
    }  

    public function deleteStage(): bool
    {
        $query = $this->db->prepare("DELETE FROM `stages` WHERE `stage_name` = 'chungus2';");
        return $query->execute();
    }
}