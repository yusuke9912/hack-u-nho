<template>
    <div class="container">
        <table class="table table-hover">
            <tr v-for="(job, index) in jobs" :key="index">
                <th scope="row">{{ job.id }}</th>
                <td>{{ job.title }}</td>
                <td>{{ job.content }}</td>
                <td>{{ job.person_in_charge }}</td>
                <td>
                    <router-link v-bind:to="{name: 'job.show', params: {jobId: job.id }}">
                        <button class="btn btn-primary">詳細</button>
                    </router-link>
                </td>
                <td>
                    <router-link v-bind:to="{name: 'job.edit', params: {jobId: job.id }}">
                        <button class="btn btn-success">編集</button>
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger" v-on:click="deleteJob(job.id)">削除</button>
                </td>
            </tr>
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
            getJobs() {
                axios.get('/api/jobs')
                    .then((res) => {
                        this.jobs = res.data;
                    });
            },
    deleteJob(id) {
        axios.delete('/api/jobs/' + id)
            .then((res) => {
                this.getJobs();
            });
    }
        },
        mounted() {
            this.getJobs();
        }
    }
</script>