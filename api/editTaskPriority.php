<?php
require_once 'functions.php';

if (empty($_POST['itemId'])) {
    exit('Id mancante');
}

$tasks = readData();

$index;

foreach ($tasks as $i => $task) {
    if ($task['task_id'] === $_POST['itemId']) {
        $index = $i;
    }
}

$tasks[$index]['task_important'] = !$tasks[$index]['task_important'];

$writeData($tasks);

header("Content-Type: application/json");

echo json_encode($tasks[$index]);
