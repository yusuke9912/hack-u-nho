<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">タイトル</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="job.title">
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">依頼内容</label>
                        <input type="text" class="col-sm-9 form-control" id="description" v-model="job.description">
                    </div>
                    <div class="form-group row">
                        <label for="date_and_time" class="col-sm-3 col-form-label">勤務日時</label>
                        <input type="text" class="col-sm-9 form-control" id="description" v-model="job.date_and_time">
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label">勤務場所</label>
                        <input type="text" class="col-sm-9 form-control" id="location" v-model="job.location">
                    </div>
                    <div class="form-group row">
                        <label for="reward" class="col-sm-3 col-form-label">報酬</label>
                        <input type="text" class="col-sm-9 form-control" id="reward" v-model="job.reward">
                    </div>
                    <div class="justify-content-center row mt-5">
                        <button type="submit" class="col-sm-3 btn btn-primary">依頼する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
        props: {
            userId: Number
        },
       data: function () {
           return {
                job: {}
           }
       },
       methods: {
            getUser() {
                axios.get("/api/user")
                    .then((res) => {
                        console.log(res);
                        this.job.job_requester = res.data.id;
                    });
           },
           submit() {
               axios.post('/api/jobs', this.job)
                   .then((res) => {
                    this.$router.push({name: 'user.list'})
                    alert("仕事を依頼しました");
                   });
           }
       },
       mounted(){
        this.job.job_receiver = this.userId;
        this.getUser();
       }
   }
</script>