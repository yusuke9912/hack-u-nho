<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <table class="table table-hover">
                    <tr v-for="(room, index) in rooms" :key="index">
                        <td>{{ room.user.sei +  room.user.mei}}</td>
                        <td>
                            <router-link v-bind:to="{name: 'user.room', params: {userId: room.user_id }}">
                                <button class="btn btn-primary">メッセージ</button>
                            </router-link>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                rooms: []
            }
        },
        methods: {
            getRooms() {
                axios.get('/api/rooms')
                    .then((res) => {
                        console.log("room一覧");
                        console.log(res);
                        this.rooms = res.data;
                    });
            },
        },
        mounted() {
            this.getRooms();
        }
    }
</script>