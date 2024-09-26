<?php

class Task {
    private int $id;
    private string $name;
    private string $description;
    private int $state;
    private string $colour;
    private int $userId;
    private string $dateCreated;
    private string $dueDate;

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

    public function getUserId(): string
    {
        return $this->userId;
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