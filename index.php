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
        <h3 class="title">My Taskboards</h3>
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
    <?php

    echo DisplayTaskboardsService::showUsersTaskboards($taskBoards);

    ?>
</body>
</html>
