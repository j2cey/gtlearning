<template>
    <div>
        <a href="#" @click.prevent="lireSession(session)">xxxxxxx</a>
    </div>
</template>

<script>
    import SessionBus from './sessionBus';
    export default {
        name: "session-item",
        props: ['default_session', 'chapitre_id'],
        data() {
            return {
                session: this.default_session,
                chapitreid: this.chapitre_id
            }
        },
        methods: {
            lireSession(session) {
                console.log("emit lire_session")
                SessionBus.$emit('lire_session', session)
            }
        }
    }
</script>

<style scoped>

</style>
