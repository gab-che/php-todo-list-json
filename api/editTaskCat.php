<?php
include_once 'tasksCategoriesApi.php';
$tasks = json_decode(file_get_contents("../tasks.json"), true);

if (empty($_POST['id']) && empty($_POST['i'])) {
    exit('Dati mancanti');
}

$index;

foreach ($tasks as $i => $task) {
    if ($task['task_id'] === $_POST['id']) {
        $index = $i;
    }
}

$new_category = $task_categories[($_POST['i'])];

$tasks[$index]['task_category'] = $new_category;

file_put_contents("../tasks.json", json_encode($tasks, JSON_PRETTY_PRINT));
echo json_encode($tasks);
