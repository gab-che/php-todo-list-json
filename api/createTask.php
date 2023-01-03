<?php
require_once 'functions.php';

array_key_exists('new_task', $_POST) ? $_POST['new_task'] : $_POST['new_task'] = '';

$tasks = readData();

$new_task = [
    'task_name' => $_POST['new_task'],
    'task_category' => $_POST['new_category'],
    'task_status' => false,
    'task_id' => uniqid(),
    'task_cat_list' => false,
    'task_important' => (bool)json_decode($_POST['priority']),
];

$tasks[] = $new_task;

$writeData($tasks);

header("Content-Type: application/json");

echo json_encode($new_task);
