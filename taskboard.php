<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskboard</title>

    <link rel="stylesheet" href="styles/taskboard.css">
    <script src="scripts/taskboardScripts.js" defer></script>
</head>
<body>
    <header>
        <h3 class="title">My To-Do List</h3>
        <a href="createTaskboard.php">New Taskboard</a>
        <a href="viewTaskboards.php">View Taskboards</a>
        <a href="login.php">Login</a>
        <a href="index.php">Home</a>
    </header>
    <div class="new-stage-container">
        <p>+ New stage</p>
    </div>
    <div class="new-stage-expanded-container hidden">
        <input type="text" placeholder="Enter stage name...">
        <div>
            <button>Add stage</button>
            <button>x</button>
        </div>
    </div>
</body>
</html>