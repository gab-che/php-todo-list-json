<?php
array_key_exists('new_task', $_POST) ? $_POST['new_task'] : $_POST['new_task'] = '';

$tasks = json_decode(file_get_contents("../tasks.json"), true);

$new_task = [
    'task_name' => $_POST['new_task'],
    'task_category' => $_POST['new_category'],
    'task_status' => false,
    'task_id' => uniqid(),
    'task_cat_list' => false,
    'task_important' => false,
];

$tasks[] = $new_task;

file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));

header("Content-Type: application/json");

echo json_encode($new_task);
