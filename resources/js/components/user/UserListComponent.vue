<template>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1>だれでもjob</h1>
      <p class="lead text-muted">
        定年退職したけどまだ働いていたい...<br>そう思ったことはありませんか？<br>だれでもJobでは「だれでも」仕事(Job)に出会えます。
      </p>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-BhVvKBdxEM" allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-theme" v-if="!isEmpty(users)">
    <div class="container">
      <div class="row">
        <div class="col-md-4" v-for="(user, index) in resultUsers" :key="index">
          <div class="card mb-4 shadow-sm">
            <div class="card-body">
				<div style="height:150px">
					<h3>{{ user.sei}}{{user.mei }}</h3>
					<p class="card-text">{{ user.self_introduction }}</p>
				</div>
            	<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
						<router-link v-bind:to="{name: 'user.show', params: {userId: user.id }}" class="btn btn-sm btn-second-theme">プロフィールを見る</router-link>
					</div>
            	</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
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
            isEmpty(obj){
                return !Object.keys(obj).length;
            },
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

<style>
.jumbotron {
  padding-top: 3rem;
  padding-bottom: 3rem;
  margin-bottom: 0;
  background-color: #fff;
}
@media (min-width: 768px) {
  .jumbotron {
    padding-top: 6rem;
    padding-bottom: 6rem;
  }
}

.jumbotron p:last-child {
  margin-bottom: 0;
}

.jumbotron h1 {
  font-weight: 300;
}

.jumbotron .container {
  max-width: 40rem;
}

.card{
  border-radius: 0.5rem;
}
</style>