<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                    <router-link v-bind:to="{name: 'job.list'}">
                         <span class="navbar-brand mb-0 h1">だれでもJob</span>
                    </router-link>
                <div>
                    <router-link v-bind:to="{name: 'job.create'}">
                        <button class="btn btn-success">Job作成</button>
                    </router-link>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {}
</script>