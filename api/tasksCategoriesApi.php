<?php
require_once 'functions.php';
$tasks = readData();

$task_categories = [];

foreach ($tasks as $task) {
    if (!in_array($task['task_category'], $task_categories)) {
        $task_categories[] = $task['task_category'];
    }
}

header("Content-Type: application/json");
echo json_encode($task_categories);
