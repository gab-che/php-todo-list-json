const { createApp } = Vue;

createApp({
    data() {
        return {
            taskList: [],
            taskData: {},
        }
    },

    methods: {
        fetchTasks() {
            axios.get('api/tasksApi.php')
                .then((resp) => {
                    this.taskList = resp.data;
                })
        },

        taskSubmit() {
            axios.post('api/createTask.php', this.taskData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((resp) => {
                    this.fetchTasks();
                })

            this.taskData.new_task = '';
        },

        changeTaskStatus(index) {
            this.taskList[index].task_status = !this.taskList[index].task_status;
        }
    },

    mounted() {
        this.fetchTasks();
    }
}).mount("#app");