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
                <div class="col-md-10 col-lg-8 m-auto">
                    <h1 class="text-center py-5">PHP To-do</h1>

                    <div class="row row-cols-1 row-cols-md-2">
                        <!-- task non importanti -->
                        <div class="col">
                            <h2>Lista task:</h2>
                            <div class="task_container mb-3 py-3" @drop="onDrop($event, false)" @dragover.prevent @dragenter.prevent>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(task, i) in taskImportance.zero" @dblclick="changeTaskStatus(task.task_id)" draggable="true" @dragstart="startDrag($event, task)">
                                        <div class="task_text d-flex gap-3 align-items-center">
                                            <span :class="task.task_status ? 'text-decoration-line-through' : ''">{{task.task_name}}</span>
                                            <div class="task_category">
                                                <span class="task_cat" @click="onCatClick(task.task_id)">{{task.task_category}}</span>
                                                <ul class="cat_list list-unstyled" :class="task.task_cat_list ? 'visible' : ''">
                                                    <li class="task_cat mb-1" v-for="(category, i) in taskCategories" @click="changeCategory(i, task.task_id)">{{category}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-secondary" @click="deleteTask(task.task_id)"><i class="fa-solid fa-trash"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- task importanti -->
                        <div class="col">
                            <h2>Priorità:</h2>
                            <div class="task_container mb-3 py-3" @drop="onDrop($event, true)" @dragover.prevent @dragenter.prevent>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(task, i) in taskImportance.one" @dblclick="changeTaskStatus(task.task_id)" draggable="true" @dragstart="startDrag($event, task)">
                                        <div class="task_text d-flex gap-3 align-items-center">
                                            <span :class="task.task_status ? 'text-decoration-line-through' : ''">{{task.task_name}}</span>
                                            <div class="task_category">
                                                <span class="task_cat" @click="onCatClick(task.task_id)">{{task.task_category}}</span>
                                                <ul class="cat_list list-unstyled" :class="task.task_cat_list ? 'visible' : ''">
                                                    <li class="task_cat mb-1" v-for="(category, i) in taskCategories" @click="changeCategory(i, task.task_id)">{{category}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-secondary" @click="deleteTask(task.task_id)"><i class="fa-solid fa-trash"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <form @submit.prevent="taskSubmit">
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="false" v-model="taskData.priority">
                                <i class="fa-solid fa-exclamation ms-2"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Inserisci nuova task" v-model="taskData.new_task" ref="input">
                            <input list="categories" type="text" class="form-control" placeholder="Inserisci categoria" v-model="taskData.new_category">
                            <datalist id="categories">
                                <option :value="category" v-for="category in taskCategories">{{category}}</option>
                            </datalist>
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