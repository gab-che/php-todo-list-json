const { createApp } = Vue;

createApp({
    data() {
        return {
            taskList: [],
            taskCategories: [],
            taskData: {
                new_task: '',
                new_category: ''
            },
        }
    },

    methods: {
        fetchTasks() {
            axios.get('api/tasksApi.php')
                .then((resp) => {
                    this.taskList = resp.data;
                })
        },

        fetchCategories() {
            axios.get('api/tasksCategoriesApi.php')
                .then((resp) => {
                    this.taskCategories = resp.data;
                })
        },

        taskSubmit() {
            axios.post('api/createTask.php', this.taskData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                    this.fetchCategories();
                })

            this.taskData.new_task = '';
            this.taskData.new_category = '';
        },

        changeTaskStatus(id) {
            axios.post('api/toggleTaskStatus.php', { id }, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                })
        },

        deleteTask(id) {
            axios.post('api/deleteTask.php', { id }, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                    this.fetchCategories()
                })
        },

        onCatClick(id) {
            this.taskList[id].task_cat_list = !this.taskList[id].task_cat_list;
        },

        changeCategory(i, id) {
            //i => indice della categoria cliccata | id => task id
            axios.post('api/editTaskCat.php', { i, id }, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                    this.fetchCategories()
                })
            console.log(i, id);
        },

        startDrag(e, item) {
            e.dataTransfer.dropEffect = 'move';
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('taskId', item.task_id);
        },

        onDrop(e, list) {
            const itemId = e.dataTransfer.getData('taskId');
            const item = this.taskList.find((task) => task.task_id === itemId);
            item.task_important = list;

            axios.post('api/editTaskPriority.php', { itemId }, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                })
        }
    },

    computed: {
        taskImportance() {
            let toReturn = {
                zero: this.taskList.filter((task) => task.task_important === false),
                one: this.taskList.filter((task) => task.task_important === true),
            }

            return toReturn
        }
    },

    mounted() {
        this.fetchTasks();
        this.fetchCategories();
    }
}).mount("#app");