<?php
require_once 'functions.php';

if (empty($_POST['id'])) {
    exit('Id mancante');
}

$tasks = readData();

$index;

foreach ($tasks as $i => $task) {
    if ($task['task_id'] === $_POST['id']) {
        $index = $i;
    }
}

$tasks[$index]['task_status'] = !$tasks[$index]['task_status'];

$writeData($tasks);

header("Content-Type: application/json");

echo json_encode($tasks[$index]);
