<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                <h2>{{ user.sei}}{{user.mei}}</h2>
                <div class="rounded bg-white p-4 border mb-4">
                <div v-for="(message, index) in messages" :key="index" class="message d-flex align-items-start mb-4" v-bind:class="[message.user_id === loginUser.id ? 'flex-row-reverse' : 'flex-row']">
                    <p class="message-text p-2 ms-2 mb-0" v-bind:class="[message.user_id === loginUser.id ? 'bg-warning' : 'bg-info']">{{ message.body }}</p><!-- .message-text -->
                </div><!-- .message -->
                </div><!-- .chat -->
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <textarea class="col-sm-10 form-control" placeholder="メッセージを入力" v-model="body"></textarea>
                        <button type="submit" class="col-sm-2 btn btn-primary">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            userId: Number
        },
        data: function () {
            return {
                user:{},
                loginUser:{},
                room_id: "",
                body:"",
                messages: {},
            }
        },
        methods: {
            getUser() {
               axios.get('/api/users/' + this.userId)
                   .then((res) => {
                       this.user = res.data;
             });
           },
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
                        console.log(res.data);
                        console.log(this.loginUser.id);
                        this.messages = res.data;
                    });
            },
            getLoginUser(){
                axios.get("/api/user")
                    .then((res) => {
                        this.loginUser = res.data;
                        this.getRoom();
                    });
            },
            submit() {
               var $message = {
                    room_id: this.room_id,
                    user_id: this.user_id,
                    body: this.body
               };
               axios.post('/api/users/' + this.userId + '/room',$message)
                   .then((res) => {
                    this.body = "";
            });
           }
        },
        mounted() {
            this.getUser();
            this.getLoginUser();
            window.Echo.private('message')
                .listen('MessageEvent', (e) => {
                    console.log("メッセージの受信");
                    var $data = 
                    {
                        'body':e.body,
                        "room_id":e.room_id,
                        "user_id":e.user.id,
                        "sei":e.user.sei,
                        "mei":e.user.mei,
                    };
                    console.log("dataは");
                    console.log($data);
                    this.messages.push($data);
                    console.log(this.messages);
                });
        }
    }
</script>

<style>
.message-icon{
  width: 48px;
  height: 48px;
  text-align: center;
  line-height: 48px;
}

.message-text{
  display: inline-block;
  max-width: 70%;
  border-radius: 1rem;
}
</style>