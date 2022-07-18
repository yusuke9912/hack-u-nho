<template>
  	<form class="form-signin"  v-on:submit.prevent="submit">
      <h3 class="h3 mb-3 font-weight-normal">ログイン</h3>
      <label for="email" class="sr-only">メールアドレス</label>
      <input type="text" id="email" class="form-control" placeholder="メールアドレス" required autofocus v-model="user.email">
      <div class="alert alert-danger" v-text="errors.email" v-if="errors.email"></div>
      <label for="password" class="sr-only">パスワード</label>
      <input type="password" id="password" class="form-control" placeholder="パスワード" required v-model="user.password">
      <div class="alert alert-danger" v-text="errors.password" v-if="errors.password"></div>
      <button class="btn btn-lg btn-second-theme btn-block" type="submit">ログイン</button>
  	</form>
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
                      console.log(error);
                      this.errors = error;
                    });
           }
       }
   }
</script>

<style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>