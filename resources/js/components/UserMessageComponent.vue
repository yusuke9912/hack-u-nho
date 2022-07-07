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
                <input type="text" class="col-sm-9 form-control" id="message" v-model="new_message.body">
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
                messages: {},
                new_message:{
                    room_id: "",
                    body:""
                }
            }
        },
        methods: {
            getMessages() {
                axios.get('/api/users/' + this.userId + '/message')
                    .then((res) => {
                        this.messages = res.data;
                        axios.get('/api/users/' + this.userId + '/room')
                            .then((res) => {
                                console.log("room_idは"+res.data);
                                this.new_message.room_id = res.data;
                            });
                    });
            },
            submit() {
                console.log(this.new_message);
               axios.post('/api/users/' + this.userId + '/room',this.new_message)
                   .then((res) => {
                    this.$router.go({ path: "/" })
            });
           }
        },
        mounted() {
            this.getMessages();
        }
    }
</script>