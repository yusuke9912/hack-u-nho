<template>
    <div class="container-fluid bg-dark mb-3">
        <p class="text-white">{{ user }}</p>
        <div class="container">
            <nav class="navbar navbar-dark">
                    <router-link v-bind:to="{name: 'job.list'}">
                         <span class="navbar-brand mb-0 h1">だれでもJob</span>
                    </router-link>
                <div>
                    <div v-if="user">
                        <router-link v-bind:to="{name: 'job.create'}">
                            <button class="btn btn-success">Job作成</button>
                        </router-link>
                        <button class="btn btn-success" @click="logout">ログアウト</button>
                    </div>
                    <div v-else>
                        <span class="text-white">{{ user }}</span>
                        <router-link v-bind:to="{name: 'signup'}">
                            <button class="btn btn-success">新規登録</button>
                        </router-link>
                        <router-link v-bind:to="{name: 'login'}">
                            <button class="btn btn-success">ログイン</button>
                        </router-link>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                user: ""
            };
        },
        mounted() {
            axios.get("/api/user?api_token=${this.$store.getters['user/user'].token}")
            .then((res) => {
                this.user = res.data;
            });
        },
        methods: {
            logout() {
                axios.get("/api/logout")
                    .then((res) => {
                       this.$router.go({path: "/", force: true})
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    }
</script>