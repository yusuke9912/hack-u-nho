<template>
    <div class="container">
        <div class="card-deck">
            <div v-for="(user, index) in users" :key="index" class="bg-white border mr-4 mb-5 rounded" style="width:30%">
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
                users: []
            }
        },
        methods: {
            getUsers() {
                axios.get('/api/users')
                    .then((res) => {
                        this.users = res.data;
                    });
            },
    deleteUser(id) {
        axios.delete('/api/users/' + id)
            .then((res) => {
                this.getUsers();
            });
    }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>