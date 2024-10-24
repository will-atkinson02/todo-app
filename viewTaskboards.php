<?php

declare(strict_types=1);

require_once 'src/Entities/User.php';
require_once 'src/Entities/Taskboard.php';
require_once 'src/Models/UsersModel.php';
require_once 'src/Models/TaskboardsModel.php';
require_once 'src/Services/DatabaseConnector.php';
require_once 'src/Services/DisplayTaskboardsService.php';

$db = DatabaseConnector::connect();

$usersModel = new UsersModel($db);

$taskboardModel = new TaskboardsModel($db);

session_start();

$taskBoards = $taskboardModel->getUsersTaskboards($_SESSION['uid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo DisplayTaskboardsService::showUsersTaskboards($taskBoards);

    ?>
</body>
</html>