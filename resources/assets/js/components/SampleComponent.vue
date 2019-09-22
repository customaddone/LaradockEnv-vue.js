<!-- templateでビューの<sample-component></sample-component>の中身を作る -->
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                Hello World!
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
