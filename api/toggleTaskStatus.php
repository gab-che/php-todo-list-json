<?php
if (empty($_POST['id'])) {
    exit('Id mancante');
}

$tasks = json_decode(file_get_contents("../tasks.json"), true);

$index;

foreach ($tasks as $i => $task) {
    if ($task['task_id'] === $_POST['id']) {
        $index = $i;
    }
}

$tasks[$index]['task_status'] = !$tasks[$index]['task_status'];

file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));

header("Content-Type: application/json");

echo json_encode($tasks[$index]);
