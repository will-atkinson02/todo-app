<?php

declare(strict_types=1);

require_once 'src/Entities/User.php';
require_once 'src/Models/UsersModel.php';
require_once 'src/Services/DatabaseConnector.php';

$db = DatabaseConnector::connect();

$usersModel = new UsersModel($db);

$user = $usersModel->getUserById(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Homepage</title>

    <link rel="stylesheet" href="styles/homepage.css">
</head>
<body>
    <header>
        <h3 class="title">My To-Do List</h3>
        <a href="taskboard">New Taskboard</a>
        <a>View Taskboards</a>
        <a>Login</a>
        <a>Home</a>
    </header>
    <h1>Welcome <?php echo $user->getUsername(); ?> to your home page!<h1>
    <div class="notifications-and-due">
        <div class="notifications-container">
            <div class="info-box title-box">Notifications:</div>
            <div class="info-box">Story 3 in Taskboard 4 edited at 13:43</div>
            <div class="info-box">New Task "Create front-end" added to Taskboard 1</div>
            <div class="info-box">New Task "Story 6" added to Taskboard 2</div>
            <div class="info-box">Task "Story 1" moved to Completed on Taskboard 1</div>
        </div>
        <div class="notifications-container">
            <div class="info-box title-box">Due soon:</div>
            <div class="info-box">Story 3 in Taskboard 4</div>
            <div class="info-box">Story 5 in Taskboard 4</div>
            <div class="info-box">Story 5 in Taskboard 1</div>
            <div class="info-box">Story 6 in Taskboard 1</div>
        </div>
    </div>
</body>
</html>
