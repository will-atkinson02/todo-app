<?php

require_once 'src/Models/StagesModel.php';
require_once 'src/Models/TasksModel.php';
require_once 'src/Entities/Stage.php';
require_once 'src/Entities/Task.php';
require_once 'src/Services/DatabaseConnector.php';

$db = DatabaseConnector::connect();

$stagesModel = new StagesModel($db);
$tasksModel = new TasksModel($db);

session_start();

$taskboardId = (int)$_GET['id'];

if (array_key_exists('stageName', $_POST)) {
    if ($_POST['stageName'] != '') {
        $allStages = $stagesModel->getTaskboardsStages($taskboardId);
    
        $found = false;
    
        foreach ($allStages as $stage) {
            if ($_POST['stageName'] === $stage->stageName()) {
                $found = true;
            }
        }
        
        if ($found === false) {
            $stagesModel->addNewStage($_POST['stageName'], $taskboardId);
        }
    }
}

if (array_key_exists('taskName', $_POST)) {
    if ($_POST['taskName'] != '') {

        var_dump($_POST);

        $stageIdKey = array_search('Add task', $_POST);


        $allTasks = $tasksModel->getStagesTasks($stageIdKey);
        
        $found = false;
    
        foreach ($allTasks as $task) {
            if ($_POST['taskName'] === $task->getName()) {
                $found = true;
            }
        }
        
        if ($found === false) {
            $tasksModel->addNewTask($_POST['taskName'], $stageIdKey);
        }
    }
}

if (isset($_POST)) {
    $key = array_search('deleteStage', $_POST);
    $keyFormatted = str_replace('_', ' ', $key);

    $stageName= $stagesModel->getStageByName($key);
    
    if (array_key_exists(0, $stageName)) {
        $tasks = $tasksModel->getStagesTasks($stageName[0]->getId());

        foreach ($tasks as $task) {
            $tasksModel->deleteTask($task->getName());
        }
    }

    $stagesModel->deleteStage($keyFormatted); 
}

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

        $allStages = $stagesModel->getTaskboardsStages($taskboardId);

        $stages = '';

        foreach ($allStages as $stage) {
            $name = $stage->stageName();
            $stages .= "<div class='stage'><form method='POST' class='name-and-delete'><div>$name</div><input name='$name' type='submit' value='deleteStage'></form>";
            
            $stageId = $stage->getId();

            $allTasks = $tasksModel->getStagesTasks($stageId);

            // echo '<pre>';
            // var_dump($allTasks);    
            

            foreach ($allTasks as $task) {
                $taskName = $task->getName();
                $stages .= "<div>$taskName</div>";
            }
            
            $stages .= "<div class='add-task-container'>Add Card</div><form class='add-task-expanded-container hidden' method='POST'>
                <input class='task-name-input' type='text' name='taskName' placeholder='Enter task name...'>
                <div>
                    <input class='task-name-submit' name='$stageId' value='Add task' type='submit'>
                    <button>x</button>
                </div>
            </form>
        </div>";
        }

        echo $stages;
    
        ?>
        <!-- HERE! -->

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