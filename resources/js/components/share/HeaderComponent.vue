<template>
    <header class="sticky-top">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" v-if="user">
            <h5 class="my-0 mr-md-auto font-weight-normal"><router-link v-bind:to="{name: 'user.list'}" class="text-dark">だれでもJob</router-link></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <router-link v-bind:to="{name: 'job.list'}" class="p-2 text-dark">依頼されている仕事一覧</router-link>
                <router-link v-bind:to="{name: 'room.list'}" class="p-2 text-dark">メッセージ一覧</router-link>
                <router-link v-bind:to="{name: 'mypage'}" class="p-2 text-dark">プロフィール</router-link>
                <router-link v-bind:to="{name: 'room.list'}" class="p-2 text-dark">メッセージ一覧</router-link>
            </nav>
            <a class="btn btn-outline-primary" @click="logout">ログアウト</a>
        </div>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" v-else>
            <h5 class="my-0 mr-md-auto font-weight-normal"><router-link v-bind:to="{name: 'user.list'}" class="text-dark">だれでもJob</router-link></h5>
            <router-link v-bind:to="{name: 'signup'}" class="btn btn-outline-primary mr-2">新規登録</router-link>
            <router-link v-bind:to="{name: 'login'}" class="btn btn-outline-primary">ログイン</router-link>
        </div>
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