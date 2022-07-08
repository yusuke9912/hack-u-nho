<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="sei" class="col-form-label">姓</label>
                            <input type="text" class="col-sm-9 form-control" id="sei" v-model="user.sei">
                        </div>
                        <div class="col-sm">
                            <label for="mei" class="col-form-label">名</label>
                            <input type="text" class="col-sm-9 form-control" id="mei" v-model="user.mei">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="sei_kana" class="col-form-label">セイ</label>
                            <input type="text" class="col-sm-9 form-control" id="sei_kana" v-model="user.sei_kana">
                        </div>
                        <div class="col-sm">
                            <label for="mei_kana" class="col-form-label">メイ</label>
                            <input type="text" class="col-sm-9 form-control" id="mei_kana" v-model="user.mei_kana">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">年齢</label>
                        <input type="number" class="col-sm-9 form-control" id="age" v-model="user.age">
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">性別</label>
                        <select class="col-sm-9 form-control" id="gender" v-model="user.gender">
                            <option value="男性">男性</option>
                            <option value="女性">女性</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">住んでる地域</label>
                        <select class="col-sm-9 form-control" id="address" v-model="user.address">
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="self_introduction" class="col-sm-3 col-form-label">自己紹介</label>
                        <input type="text" class="col-sm-9 form-control" id="self_introduction" v-model="user.self_introduction">
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data: function () {
           return {
                user: {}
           }
       },
       methods: {
           getUser() {
                axios.get("/api/user")
                    .then((res) => {
                        console.log(res);
                        this.user = res.data;
                    });
           },
           submit() {
                    console.log(this.user);
               axios.put('/api/users/' + this.user.id, this.user)
                   .then((res) => {
                    this.user = res.data;
                    console.log(this.user);
                   });
           }
       },
       mounted() {
           this.getUser();
       }    }
</script>