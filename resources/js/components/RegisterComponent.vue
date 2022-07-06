<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="sei" class="col-sm-3 col-form-label">姓</label>
                        <input type="text" class="col-sm-9 form-control" id="sei" v-model="user.sei">
                    </div>
                    <div class="form-group row">
                        <label for="mei" class="col-sm-3 col-form-label">名</label>
                        <input type="text" class="col-sm-9 form-control" id="mei" v-model="user.mei">
                    </div>
                    <div class="form-group row">
                        <label for="sei_kana" class="col-sm-3 col-form-label">セイ</label>
                        <input type="text" class="col-sm-9 form-control" id="sei_kana" v-model="user.sei_kana">
                    </div>
                    <div class="form-group row">
                        <label for="mei_kana" class="col-sm-3 col-form-label">メイ</label>
                        <input type="text" class="col-sm-9 form-control" id="mei_kana" v-model="user.mei_kana">
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">性別</label>
                        <input type="text" class="col-sm-9 form-control" id="gender" v-model="user.gender">
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">年齢</label>
                        <input type="number" class="col-sm-9 form-control" id="age" v-model="user.age">
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">住んでる地域</label>
                        <input type="text" class="col-sm-9 form-control" id="address" v-model="user.address">
                    </div>
                    <div class="form-group row">
                        <label for="self_introduction" class="col-sm-3 col-form-label">自己紹介</label>
                        <input type="text" class="col-sm-9 form-control" id="self_introduction" v-model="user.self_introduction">
                    </div>                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
                        <input type="text" class="col-sm-9 form-control" id="email" v-model="user.email">
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                        <input type="text" class="col-sm-9 form-control" id="password" v-model="user.password">
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
                user: {},
                errors: {}
           }
       },
       methods: {
           submit() {
                console.log(this.user);
               axios.post('/api/signup', this.user)
                    .then((res) => {
                        console.log("新規登録しました")
                    })
                    .catch((error)=>{

                    });
           }
       }
   }
</script>