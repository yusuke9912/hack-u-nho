<template>
    <div class="container">
        <table class="table table-hover">
            <tr v-for="(user, index) in users" :key="index">
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.email }}</td>
                <td>{{ user.sei }}</td>
                <td>{{ user.mei }}</td>
                <td>
                    <router-link v-bind:to="{name: 'user.show', params: {userId: user.id }}">
                        <button class="btn btn-primary">詳細</button>
                    </router-link>
                </td>
                <!-- 
                <td>
                    <router-link v-bind:to="{name: 'user.edit', params: {userId: user.id }}">
                        <button class="btn btn-success">編集</button>
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger" v-on:click="deleteuser(user.id)">削除</button>
                </td> -->
            </tr>
        </table>
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