<!-- 単一コンポーネントはjs/Componentに収納する -->
<template>
    <p>
        {{message}}
    </p>
</template>
<script>
    export default {
        data: () => {
            return {
                message: '今日も最高！！'
            }
        }
    }
</script>
