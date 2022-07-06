<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id" v-model="user.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="sei" class="col-sm-3 col-form-label">姓</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="sei" v-model="user.sei">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="mei" class="col-sm-3 col-form-label">名</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="mei" v-model="user.mei">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="gender" class="col-sm-3 col-form-label">性別</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="gender" v-model="user.gender">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="age" class="col-sm-3 col-form-label">年齢</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="age" v-model="user.age">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="address" class="col-sm-3 col-form-label">住んでる地域</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="address" v-model="user.address">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="self_introduction" class="col-sm-3 col-form-label">自己紹介</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="self_introduction" v-model="user.self_introduction">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            userId: String
        },
       data: function () {
           return {
               user: {}
           }
       },
       methods: {
           getUser() {
               axios.get('/api/users/' + this.userId)
                   .then((res) => {
                       this.user = res.data;
                   });
           }
       },
       mounted() {
           this.getUser();
       }    }
</script>