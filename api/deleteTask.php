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

array_splice($tasks, $index, 1);

file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
