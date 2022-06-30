<template>
    <header class="bg-primary text-white p-1 d-flex">
        <h1>だれでもJob</h1>
        <nav>
            <router-link v-bind:to="{name: 'signup'}">
                <button class="btn btn-outline-primary bg-white">新規登録</button>
            </router-link>
        </nav>
    </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
