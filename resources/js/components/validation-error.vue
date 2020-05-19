<template>
    <div>
        <div v-if="state === 'true'" class="alert alert-success" role="alert">
            Form is sent successfully
        </div>
        <div v-if="state === 'false'">
            <ul class="alert alert-danger">
                <li v-for="value of data">{{ value[0] }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props:['data','state']
    }
</script>

<style scoped>
    li{
        list-style-type: none;
    }
</style>
