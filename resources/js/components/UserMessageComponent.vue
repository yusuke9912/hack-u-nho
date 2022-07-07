<template>
    <div class="container">
        <table class="table table-hover">
            <tr v-for="(message, index) in messages" :key="index">
                <td>{{ message.sei + message.mei }}</td>
                <td>{{ message.body }}</td>
            </tr>
        </table>
        <form v-on:submit.prevent="submit">
            <div class="form-group row">
                <label for="person-in-charge" class="col-sm-3 col-form-label">メッセージ</label>
                <input type="text" class="col-sm-9 form-control" id="message" v-model="body">
            </div>
            <button type="submit" class="btn btn-primary">送信</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            userId: Number
        },
        data: function () {
            return {
                room_id: "",
                user_id: "",
                body:"",
                messages: {},
            }
        },
        methods: {
            getRoom(){
                axios.get('/api/users/' + this.userId + '/room')
                .then((res) => {
                    console.log("room_idは"+res.data.room_id);
                    this.room_id = res.data.room_id;
                    this.getMessages();
                });
            },
            getMessages() {
                axios.post('/api/users/' + this.userId + '/message',{'room_id':this.room_id})
                    .then((res) => {
                        this.messages = res.data;
                        console.log("メッセージ"+res.data)
                    });
            },
            submit() {
               var $message = {
                    room_id: this.room_id,
                    user_id: this.user_id,
                    body: this.body
               };
               console.log($message);
               axios.post('/api/users/' + this.userId + '/room',$message)
                   .then((res) => {
                    this.$router.go({ path: "/" })
            });
           }
        },
        mounted() {
            this.getRoom();
        }
    }
</script>