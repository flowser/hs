<template>
    <div id="adminmain">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
        
        <!-- main component -->
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
