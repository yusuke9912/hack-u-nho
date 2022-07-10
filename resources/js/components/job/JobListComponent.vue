<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr><th>タイトル</th><th>説明</th><th>依頼者</th><th colspan="2"></th></tr>
                    </thead>
                    <tbody>
                    <tr v-for="(job, index) in jobs" :key="index">
                        <td>{{ job.title }}</td>
                        <td>{{ job.description }}</td>
                        <td>{{ job.sei + job.mei }}</td>
                        <td>
                            <router-link v-bind:to="{name: 'job.show', params: {jobId: job.id }}" class="btn btn-outline-primary btn-sm">詳細</router-link>
                        </td>
                    </tr>
                    </tbody>
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