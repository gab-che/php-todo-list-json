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
                    console.log(resp);
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
        }
    },

    mounted() {
        this.fetchTasks();
    }
}).mount("#app");