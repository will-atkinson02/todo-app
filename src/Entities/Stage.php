<?php 

class Stage {
    private int $id;
    private string $stage_name;
    private string $taskboard_id; 

    public function getId(): int
    {
        return $this->id;
    }

    public function stageName(): string
    {
        return $this->stage_name;
    }
    
    public function taskboardId(): int
    {
        return $this->taskboard_id;
    }
}