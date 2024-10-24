<?php 

declare(strict_types=1);

class DisplayTaskboardsService {
    public static function showUsersTaskboards(array $taskBoards): string 
    {
        $displayTaskboards = '';

        foreach ($taskBoards as $taskBoard) {
            $displayTaskboards .= "<div><a href='taskboard.php?id={$taskBoard->getId()}'>{$taskBoard->getTaskboardName()}</a></div>";
        }

        return $displayTaskboards;
    }
}