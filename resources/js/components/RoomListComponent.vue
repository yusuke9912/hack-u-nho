<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr><th class="px-5">氏名</th><th colspan="2"></th></tr>
                    </thead>
                    <tbody>
                    <tr v-for="(room, index) in rooms" :key="index">
                        <td class="w-75 px-5">
                            <router-link v-bind:to="{name: 'user.show', params: {userId: room.user_id }}">{{ room.user.sei +  room.user.mei}}</router-link>
                        </td>

                        <td class="w-25">
                            <router-link v-bind:to="{name: 'user.room', params: {userId: room.user_id }}" class="btn btn-primary btn-sm">メッセージ</router-link>
                        </td>
                    </tr>
                    </tbody>
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