<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Reward</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(job, index) in jobs" :key="index">
                    <th scope="row">{{ job.id }}</th>
                    <td>{{ job.title }}</td>
                    <td>{{ job.content }}</td>
                    <td>{{ job.person_in_charge }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: {taskId: job.id }}">
                            <button class="btn btn-primary">Show</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: job.id }}">
                            <button class="btn btn-success">Edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                jobs: []
            }
        },
        methods: {
            getTJobs() {
                axios.get('/api/jobs')
                    .then((res) => {
                        this.jobs = res.data;
                    });
            }
        },
        mounted() {
            this.getJobs();
        }
    }
</script>