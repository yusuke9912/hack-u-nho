<template>
    <div>
        <header-component></header-component>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">テスト</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue'
    export default {
  components: { HeaderComponent },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
