<template>
    <transition name="fade">
        <router-view />
    </transition>
</template>

<script>

    export default {
        name: "cours-create",
        created() {
            //this.$router.push('/cours/create');
            this.$router.push({name: 'cours.create'});
        }
    }
</script>

<style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition-property: opacity;
        transition-duration: 0.25s;
    }
    .fade-enter-active {
        transition-delay: 0.25s;
    }
    .fade-enter,
    .fade-leave-active {
        opacity: 0;
    }
</style>
