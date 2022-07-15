<template>
    <header class="sticky-top">
      <nav class="navbar navbar-light bg-theme p-3 px-md-4 bg-theme border-bottom shadow-sm" id="pc-header">
        <h1 class="my-0 mr-md-auto font-weight-normal"><router-link v-bind:to="{name: 'user.list'}" class="text-dark"><img :src="'/image/logo.png'" alt="" width="180px"></router-link></h1>
          <nav class="my-2 my-md-0 mr-md-3" v-if="user">
            <router-link v-bind:to="{name: 'job.list'}" class="p-2 text-dark">依頼されている仕事一覧</router-link>
            <router-link v-bind:to="{name: 'room.list'}" class="p-2 text-dark">メッセージ一覧</router-link>
            <router-link v-bind:to="{name: 'mypage'}" class="p-2 text-dark">プロフィール</router-link>
          </nav>
          <a class="btn btn-second-theme" @click="logout" v-if="user">ログアウト</a>
          <router-link v-bind:to="{name: 'login'}" class="btn btn-second-theme mr-2" v-if="!user">ログイン</router-link>
          <router-link v-bind:to="{name: 'signup'}" class="btn btn-second-theme" v-if="!user">新規登録</router-link>
      </nav>
      <nav class="navbar navbar-light bg-theme p-3 px-md-4 bg-theme border-bottom shadow-sm" id ="sp-header">
        <h1 class="my-0 mr-md-auto font-weight-normal"><router-link v-bind:to="{name: 'user.list'}" class="text-dark"><img :src="'/image/logo.png'" alt="" width="110px"></router-link></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav text-right pr-3">
            <li class="nav-item">
              <router-link v-bind:to="{name: 'job.list'}" class="nav-link" v-if="user">依頼されている仕事一覧</router-link>
            </li>
            <li class="nav-item">
              <router-link v-bind:to="{name: 'room.list'}" class="nav-link" v-if="user">メッセージ一覧</router-link>
            </li>
            <li class="nav-item">
              <router-link v-bind:to="{name: 'mypage'}" class="nav-link" v-if="user">プロフィール</router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" @click="logout" v-if="user">ログアウト</a>
            </li>
            <li class="nav-item">
              <router-link v-bind:to="{name: 'login'}" class="nav-link" v-if="!user">ログイン</router-link>
            </li>
            <li class="nav-item">
              <router-link v-bind:to="{name: 'signup'}" class="nav-link" v-if="!user">新規登録</router-link>
            </li>
          </ul>
        </div>
     </nav>
    </header>
</template>

<script>
    export default {
        data: function () {
            return {
                user: ""
            };
        },
        methods: {
            logout() {
                axios.get("/api/logout")
                    .then((res) => {
                        this.$router.push('/login', () => {})
                        this.$router.go({ path: "/" })
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            axios.get("/api/user")
            .then((res) => {
                this.user = res.data;
                this.$store.dispatch("setUser", {id: res.data.id, auth: true, token: res.data.api_token})
            });
        },
    }
</script>

<style>
#pc-header{
    display: flex;
}

#sp-header{
    display: none;
}

@media (max-width: 768px) {
    #pc-header{
        display: none;
    }

    #sp-header{
        display: flex;
    }
}
</style>