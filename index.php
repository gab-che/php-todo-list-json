<?php
$tasks = json_decode(file_get_contents("tasks.json"), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>PHP To-do list</title>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-5 m-auto">
                    <h1 class="text-center py-5">PHP To-do</h1>
                    <div class="task_container mb-3">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="task in taskList" :class="task.task_status ? 'text-decoration-line-through' : ''" @dblclick="changeTaskStatus(task.task_id)">
                                <span>{{task.task_name}}</span>
                                <button class="btn btn-outline-secondary" @click="deleteTask(task.task_id)"><i class="fa-solid fa-trash"></i></button>
                            </li>
                        </ul>
                    </div>
                    <form @submit.prevent="taskSubmit">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Inserisci nuova task" v-model="taskData.new_task">
                            <button class="btn btn-outline-secondary">Invia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/script.js"></script>

</html>