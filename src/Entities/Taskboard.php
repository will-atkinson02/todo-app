<?php

class Taskboard {
    private int $id;
    private string $taskboard_name;
    private int $user_id;

    public function getId(): int 
    {   
        return $this->id;
    }

    public function getTaskboardName(): string 
    {
        return $this->taskboard_name;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }
}