<?php
$tasks = json_decode(file_get_contents("../tasks.json"), true);

$new_task = [
    'task_name' => "Hitchhike across space",
    'task_status' => true,
];

$tasks[] = $new_task;

$new_task_json = json_encode($tasks, JSON_PRETTY_PRINT);
file_put_contents("../tasks.json", $new_task_json);

var_dump($tasks);
