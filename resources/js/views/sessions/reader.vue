<template>
    <iframe id="iframereader" :src="'https://player.vimeo.com/video/' + $route.params.id"
            width="770" height="400" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"
    ></iframe>
</template>

<script>
    import Player from '@vimeo/player'
    export default {
        name: "reader",
        mounted() {
            //var iframe = document.querySelector('iframe');
            var player = new Player('iframereader');

            player.on('play', function() {
                console.log('played the video!');
            });

            player.getVideoTitle().then(function(title) {
                console.log('title:', title);
            });
        }
    }
</script>

<style scoped>

</style>
