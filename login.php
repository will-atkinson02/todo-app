<?php 

declare(strict_types=1);

require_once 'src/Services/DatabaseConnector.php';
require_once 'src/Entities/User.php';
require_once 'src/Models/UsersModel.php';

$db = DatabaseConnector::connect();

$usersModel =  new UsersModel($db);

if(isset($_POST['username'], $_POST['password'] )) {
    $user = $usersModel->checkUserExists($_POST['username']);
    if ($user === false) {
        echo "this account doesn't exist";
        // throw new Exception("Sorry, this account doesn't exist!");
    } else if ($_POST['password'] != $user->getPassword()) {
        echo 'Wrong Password';
    } else {
        session_start();

        $_SESSION['loggedIn'] = true;
        $_SESSION['uid'] = $user->getId();

        header("Location: index.php");
    }

    // check password is correct
    // $passwordVerify = password_verify($_POST['password'], $users->getPassword());

    // if (!$passwordVerify) {
    //     throw new Exception("Incorrect password!");
    // }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <pre>
    <form method="post">
        <label for="username" >Enter Username:</label>
        <input id="username" type="text" name="username" />

        <label for="password" >Enter Password:</label>
        <input id="password" type="password" name="password" />

        <input type="submit" value="Login" />

    </form>
</body>
</body>
</html>