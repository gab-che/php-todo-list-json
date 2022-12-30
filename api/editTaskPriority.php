<?php
if (empty($_POST['itemId'])) {
    exit('Id mancante');
}

$tasks = json_decode(file_get_contents("../tasks.json"), true);

$index;

foreach ($tasks as $i => $task) {
    if ($task['task_id'] === $_POST['itemId']) {
        $index = $i;
    }
}

$tasks[$index]['task_important'] = !$tasks[$index]['task_important'];

file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));

header("Content-Type: application/json");

echo json_encode($tasks[$index]);
