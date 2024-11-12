<?php

header('Content-Type: application/json');

require_once 'src/Services/DatabaseConnector.php';
require_once 'src/Models/TasksModel.php';
require_once 'src/Entities/Task.php';

$db = DatabaseConnector::connect();

$taskModel = new TasksModel($db);

$inputData = file_get_contents('php://input');

file_put_contents('input_log.txt', $inputData . PHP_EOL, FILE_APPEND);

// Decode the JSON data
$data = json_decode($inputData, true);

// Check if the decoding was successful
if ($data === null) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to decode JSON data.',
        'raw_input' => $inputData // Optionally log the raw input as part of the response for debugging
    ]);
    exit;
}

//echo $inputData;

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Get the data from the request
    $taskId = $_PUT['taskId'];
    $stageId = $_PUT['stageId'];


    // Call the update function
    $result = $taskModel->updateTask($taskId, $stageId);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}