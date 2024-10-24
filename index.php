<?php

declare(strict_types=1);

require_once 'src/Entities/User.php';
require_once 'src/Models/UsersModel.php';
require_once 'src/Services/DatabaseConnector.php';

$db = DatabaseConnector::connect();

$usersModel = new UsersModel($db);

session_start();

if(isset($_POST['logout'])) {
    $_SESSION['loggedIn'] = false;
    session_destroy();
    header("Location: index.php");
}

if(isset($_SESSION['loggedIn'])) {
    //$addNewPost = "<div class='add-new-container'><a href='CreateNewPost.php'> <span>+</span> Add new post</a></div>";
    $logout = "<form method='post'><input type='submit' name='logout' value='logout'/></form>";
    $user = $usersModel->getUserById($_SESSION['uid']);
} else {
    $login = "<a href='login.php'>Login</a>";
}

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
        <a href="taskboard.php">New Taskboard</a>
        <a href="viewTaskboards.php">View Taskboards</a>
        <?php $login;
        
        if (isset($_SESSION['loggedIn'])) {
            echo $logout;
        } else {
            echo $login;
            echo "<a href='Registration.php'><input type='submit' value='Sign up'/></a>";
        }

        ?> 
        <a href="index.php">Home</a>
    </header>
    <h1>Welcome <?php 

    if (isset($_SESSION['loggedIn'])) {
        echo $user->getUsername(); 
    }
    
    ?> to your home page!<h1>
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
