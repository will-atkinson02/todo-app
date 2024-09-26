<?php

declare(strict_types=1);

class DatabaseConnector
{
    public static function connect(): PDO
    {
        $db = new PDO('mysql:host=db;dbname=todos', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}