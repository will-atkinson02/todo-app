<?php

require_once 'src/Models/StagesModel.php';
require_once 'src/Entities/Stage.php';
require_once 'src/Services/DatabaseConnector.php';

$db = DatabaseConnector::connect();

$stagesModel = new StagesModel($db);

if ($_POST['stageName'] != '') {
    $stagesModel->addNewStage($_POST['stageName']);
}

if (isset($_POST)) {
     $stagesModel->deleteStage();
}

// echo '<pre>';
// var_dump($_POST);

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

    <div class="container-container">
        <?php
        $allStages = $stagesModel->getTaskboardsStages();

        foreach ($allStages as $stage) {
            $name = $stage->stageName();
            echo $name;
            echo "<div class='stage'><form method='POST' class='name-and-delete'><div>$name</div><input name='$name' type='submit' value='delete'></form><div>Add Card</div></div>";
        }

        ?>


        <div class="new-stage-container">
            <i>+</i> New stage
        </div>
        
        <form class="new-stage-expanded-container hidden" method="POST">
            <input class="stage-name-input" type="text" name="stageName" placeholder="Enter stage name...">
            <div>
                <input class="stage-name-submit" value="Add stage" type="submit">
                <button>x</button>
            </div>
        </form>
    </div>
    
</body>
</html>