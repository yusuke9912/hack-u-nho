<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="job.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Description</label>
                        <input type="text" class="col-sm-9 form-control" id="description" v-model="job.description">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Location</label>
                        <input type="text" class="col-sm-9 form-control" id="location" v-model="job.location">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Reward</label>
                        <input type="text" class="col-sm-9 form-control" id="reward" v-model="job.reward">
                    </div>
                    <button type="submit" class="btn btn-primary">作成</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
       data: function () {
           return {
                job: {}
           }
       },
       methods: {
           submit() {
               axios.post('/api/jobs', this.job)
                   .then((res) => {
                       this.$router.push({name: 'job.list'});
                   });
           }
       }
   }
</script>