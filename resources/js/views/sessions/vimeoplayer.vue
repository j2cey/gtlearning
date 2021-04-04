<template>
    <vimeo-player ref="player" :video-id="$route.params.id" @ready="onReady" :player-height="height"></vimeo-player>
</template>

<script>
    //import VimeoPlayer from 'vue-vimeo-player'

    export default {
        name: "vimeoplayer",
        //components: { VimeoPlayer },
        data() {
            return {
                videoID: 'some-id',
                height: 500,
                options: {
                    muted: true,
                    autoplay: true,
                },
                playerReady: false
            }
        },
        methods: {
            onReady() {
                this.playerReady = true
            },
            play () {
                this.$refs.player.play()
            },
            pause () {
                this.$refs.player.pause()
            }
        }
    }
</script>

<style scoped>

</style>
