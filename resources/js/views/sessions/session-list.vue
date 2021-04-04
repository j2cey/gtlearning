<template>
    <div class="container">
        <table class="table table-hover table-sm">
            <tbody>

                <tr v-for="(session, key) in sessions">

                    <td>
                        <h5>
                          <span>
                            <small><span class="badge badge-success" style="vertical-align: top">{{ key + 1 }}. </span></small>
                            <a href="#" @click.prevent="lireSession(session)">{{ session.intitule }}</a>
                          </span>
                        </h5>
                        <p>{{ session.description }}</p>
                    </td>

                    <td>
                        <label><i class="fa fa-file-video-o mr-0"></i></label>
                        <p></p>
                    </td>

                    <td>
                        <label>Quiz</label>
                        <p>
                            <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
                        </p>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</template>

<script>
    import SessionBus from './sessionBus';

    export default {
        name: "session-list",
        props: ['default_sessions', 'chapitre_id'],
        data() {
            return {
                sessions: this.default_sessions,
                chapitreid: this.chapitre_id
            }
        },
        methods: {
            lireSession(session) {
                SessionBus.$emit('lire_session', session)
            }
        }
    }
</script>

<style scoped>

</style>
