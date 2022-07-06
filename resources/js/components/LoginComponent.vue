<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">メールアドレス</label>
                        <input type="text" class="col-sm-9 form-control" id="email" v-model="user.email">
                        <div class="alert alert-danger" v-text="errors.email" v-if="errors.email"></div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">パスワード</label>
                        <input type="text" class="col-sm-9 form-control" id="password" v-model="user.password">
                        <div class="alert alert-danger" v-text="errors.password" v-if="errors.password"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">ログイン</button>
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
               axios.post('/api/login', this.user)
                    .then((res) => {
                        this.$store.dispatch("setUser", {name: "", auth: true, token: ""})
                        this.$router.push('/', () => {})
                        this.$router.go({ path: "/" })
                    })
                    .catch((error)=>{
                        this.$router.go({path: "/", force: true})
                    });
           }
       }
   }
</script>