<?php
array_key_exists('new_task', $_POST) ? $_POST['new_task'] : $_POST['new_task'] = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
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
                    <div class="task_container"></div>
                    <form action="api/createTask.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Inserisci nuova task" name="new_task">
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