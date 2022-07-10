<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-outline-primary mb-5" onclick="history.back(-1)">戻る</button>
                                <table class="table table-striped">
                    <tr>
                        <th>氏名</th>
                        <td><ruby>{{ user.sei + user.mei}}<rt>{{user.sei_kana + user.mei_kana}}</rt></ruby></td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>{{ user.year + "年" + user.month + "月" + user.day + "日" }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ user.gender }}</td>
                    </tr>
                    <tr>
                        <th>居住地</th>
                        <td>{{ user.address }}</td>
                    </tr>
                    <tr>
                        <th>自己紹介</th>
                        <td>{{ user.self_introduction}}</td>
                    </tr>
                </table>
                <div class="justify-content-center row mt-5">
                    <router-link v-bind:to="{name: 'user.room', params: {userId: user.id }}" class="col-sm-4">
                        <button class="btn btn-primary col-sm-12">メッセージ</button>
                    </router-link>
                    <router-link v-bind:to="{name: 'job.request', params: {userId: user.id }}" class="col-sm-4">
                        <button class="btn btn-primary col-sm-12">お仕事依頼</button>
                    </router-link>
                </div>
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
               user: {}
           }
       },
       methods: {
           getUser() {
               axios.get('/api/users/' + this.userId)
                   .then((res) => {
                       this.user = res.data;
                   });
           }
       },
       mounted() {
           this.getUser();
       }    }
</script>