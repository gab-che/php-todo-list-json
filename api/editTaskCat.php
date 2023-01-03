<?php
require_once 'functions.php';
include_once 'tasksCategoriesApi.php';
$tasks = readData();

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

$writeData($tasks);

echo json_encode($tasks);
