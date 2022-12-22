const { createApp } = Vue;

createApp({
    data() {
        return {
            taskList: [],
        }
    },

    methods: {
        fetchTasks() {
            axios.get('api/tasksApi.php')
                .then((resp) => {
                    console.log(resp);
                    this.taskList = resp.data;
                })
        }
    },

    mounted() {
        this.fetchTasks();
    }
}).mount("#app");