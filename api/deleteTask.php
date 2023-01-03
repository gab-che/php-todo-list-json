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

array_splice($tasks, $index, 1);

$writeData($tasks);
