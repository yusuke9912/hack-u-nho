<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-second-theme mb-5" onclick="history.back(-1)">戻る</button>
                <table class="table table-striped">
                    <tr>
                        <th>依頼者</th>
                        <td>{{ job[0].sei + job[0].mei}}</td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>{{ job[0].title }}</td>
                    </tr>
                    <tr>
                        <th>依頼内容</th>
                        <td>{{ job[0].description }}</td>
                    </tr>
                    <tr>
                        <th>勤務日時</th>
                        <td>{{ job[0].date_and_time }}</td>
                    </tr>
                    <tr>
                        <th>勤務場所</th>
                        <td>{{ job[0].location }}</td>
                    </tr>
                    <tr>
                        <th>報酬</th>
                        <td>{{ job[0].reward }}</td>
                    </tr>
                </table>
                <div class="justify-content-center row mt-5">
                    <router-link v-bind:to="{name: 'user.room', params: {userId: job[0].job_requester }}" class="col-sm-3 btn btn-second-theme">メッセージ</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            jobId: String
        },
       data: function () {
           return {
               job: {}
           }
       },
       methods: {
           getJob() {
               axios.get('/api/jobs/' + this.jobId)
                   .then((res) => {
                    console.log(res);
                       this.job = res.data;
                   console.log(this.job);
                   });
           }
       },
       mounted() {
           this.getJob();
       }    }
</script>

<style>
 th{
    width: 30%;
 }
</style>