<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <button class="btn btn-outline-second-theme my-3" onclick="history.back(-1)">戻る</button>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr><th style="min-width:110px">タイトル</th><th>仕事内容</th><th style="min-width:70px"></th></tr>
                    </thead>
                    <tbody>
                    <tr v-for="(job, index) in jobs" :key="index">
                        <td>{{ job.title }}</td>
                        <td>{{ job.description }}</td>
                        <!-- <td>
                            <router-link v-bind:to="{name: 'user.show', params: {userId: job.job_requester }}">{{ job.sei + job.mei }}</router-link>
                        </td> -->
                        <td>
                            <router-link v-bind:to="{name: 'job.show', params: {jobId: job.id }}" class="btn btn-second-theme btn-sm">詳細</router-link>
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