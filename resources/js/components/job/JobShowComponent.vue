<template>
    <div class="container">
        <div class="row justify-content-center">
            <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="job.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title" v-model="job.title">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Description</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="description" v-model="job.description">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Location</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="location" v-model="job.location">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Reward</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="reward" v-model="job.reward">
                    </div>
                </form>
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
                       this.job = res.data;
                   });
           }
       },
       mounted() {
           this.getJob();
       }    }
</script>