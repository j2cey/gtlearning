<template>
    <div>
        <div v-if="$route.params.id" :data-vimeo-id="$route.params.id" :key="$route.params.id" data-vimeo-width="825" id="handstick"></div>
    </div>
</template>

<script>
    import Swal from 'sweetalert'
    import Player from '@vimeo/player'
    import SessionBus from './sessionBus'
    import { vueVimeoPlayer } from 'vue-vimeo-player'

    export default {
        name: "Player",
        //props: ['default_session', 'next_session_url'],
        beforeMount() {
            var session_id = this.$route.params.id
            console.log('before mount, id', this.$route.params.id)
        },
        created() {
            axios.get(`/sessions.byid/${this.$route.params.id}`)
                .then(({data}) => this.session = data);
        },
        data() {
            return {
                session: null,//JSON.parse(this.default_session),
            }
        },
        methods: {
            reInitialize() {
                console.log("reInitialize")
                const player = new Player('handstick')

                player.on('ended', () => {
                    this.completeLesson()
                })
            },
            displayVideoEndedAlert() {
                console.log('displayVideoEndedAlert')
            },
            completeLesson() {
                console.log('completeLesson')
            }
        },
        mounted() {
            this.reInitialize()
        },
        computed: {
            current_session() {
                return this.session
            }
        },
        watch: {
            // call method if the route changes
            '$route': 'reInitialize'
        },
    }
</script>

<style scoped>

</style>
