<template>
    <div class="container">
        <div class="card-deck">
            <div v-for="(user, index) in resultUsers" :key="index" class="bg-white border mr-4 mb-5 rounded" style="width:30%">
                <div class="card-body">
                <div class="card-title">
                    <h5>{{ user.sei + user.mei }}</h5>
                </div>
                <div class="card-text">
                    <p>{{ user.self_introduction }}</p>
                    <router-link v-bind:to="{name: 'user.show', params: {userId: user.id }}">
                        <button class="btn btn-primary">詳細</button>
                    </router-link>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                loginUser:{},
                users: []
            }
        },
        methods: {
            getUsers() {
                axios.get('/api/users')
                    .then((res) => {
                        console.log("データを取得しました");
                        console.log(res.data);
                        this.users = res.data;
                    });

                axios.get("/api/user")
                    .then((res) => {
                        this.loginUser = res.data;
                    });
            },
        },
        computed: {
            resultUsers(){
                return this.users.filter((user)=>{
                    return user.id != this.loginUser.id;
                })
            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>