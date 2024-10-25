<?php

class Task {
    private int $id;
    private string $name;
    private string|NULL $description;
    private int|NULL $state;
    private string|NULL $colour;
    private int|NULL $stageId;
    private string|NULL $dateCreated;
    private string|NULL $dueDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function getColour(): string
    {
        return $this->colour;
    }

    public function getStageId(): string
    {
        return $this->stageId;
    }

    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

}