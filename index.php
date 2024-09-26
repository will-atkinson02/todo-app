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
    <title>Document</title>
</head>
<body>
    <header>
        <h3>My To-Do List</h3>
        <a>Home</a>
        <a>View Taskboards</a>
        <a>New Taskboard</a>
        <a>Login</a>
    </header>
    <h1>Welcome <?php echo $user->getUsername(); ?> to your To-Do Page!<h1>
    <div>
        <div>Notifications:</div>
    </div>
    <div>
        <div>Due soon:</div>
    </div>
</body>
</html>
