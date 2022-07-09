<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <table class="table table-hover">        
                    <tr v-for="(job, index) in jobs" :key="index">
                        <th scope="row">{{ job.id }}</th>
                        <td>{{ job.title }}</td>
                        <td>{{ job.description }}</td>
                        <td>
                            <router-link v-bind:to="{name: 'job.show', params: {jobId: job.id }}">
                                <button class="btn btn-primary">詳細</button>
                            </router-link>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
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
                        console.log(res);
                        this.jobs = res.data;
                    });
            },
        },
        mounted() {
            this.getJobs();
        }
    }
</script>