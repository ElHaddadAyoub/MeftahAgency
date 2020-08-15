<template>
    <div id="publicMain">
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "PublicMaster"
    }
</script>

<style scoped>
 .fade-enter, .fade-leave-to {
     opacity: 0;
     transform: translateX(2em);
 }
 .fade-enter-active, .fade-leave-active {
     transition: all .3s ease;
 }
</style>
