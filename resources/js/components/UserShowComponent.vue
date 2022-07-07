<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="sei" class="col-form-label">姓</label>
                            <input type="text" class="col-sm-9 form-control" readonly id="sei" v-model="user.sei">
                        </div>
                        <div class="col-sm">
                            <label for="mei" class="col-form-label">名</label>
                            <input type="text" class="col-sm-9 form-control" readonly id="mei" v-model="user.mei">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="sei_kana" class="col-form-label">セイ</label>
                            <input type="text" class="col-sm-9 form-control" readonly id="sei_kana" v-model="user.sei_kana">
                        </div>
                        <div class="col-sm">
                            <label for="mei_kana" class="col-form-label">メイ</label>
                            <input type="text" class="col-sm-9 form-control" readonly id="mei_kana" v-model="user.mei_kana">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">年齢</label>
                        <input type="text" class="col-sm-9 form-control" readonly id="age" v-model="user.age">
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">性別</label>
                        <input type="text" class="col-sm-9 form-control" readonly id="gender" v-model="user.gender">
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">住んでる場所</label>
                        <input type="text" class="col-sm-9 form-control" readonly id="address" v-model="user.address">
                    </div>
                    <div class="form-group row">
                        <label for="self_introduction" class="col-sm-3 col-form-label">自己紹介</label>
                        <input type="text" class="col-sm-9 form-control" readonly id="self_introduction" v-model="user.self_introduction">
                    </div>
                </form>
                <router-link v-bind:to="{name: 'user.room', params: {userId: user.id }}">
                    <button class="btn btn-primary">メッセージ</button>
                </router-link>
                <router-link v-bind:to="{name: 'user.room', params: {userId: user.id }}">
                    <button class="btn btn-primary">お仕事依頼</button>
                </router-link>
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