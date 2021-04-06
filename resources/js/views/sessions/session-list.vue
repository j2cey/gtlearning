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
                </tr>

            </tbody>
        </table>

    </div>

</template>

<script>
    import SessionBus from './sessionBus';

    export default {
        name: "session-list",
        props: {
            sessions_prop: null,
            chapitreid_prop: null
        },
        data() {
            return {
                sessions: this.sessions_prop,
                chapitreid: this.chapitreid_prop
            }
        },
        mounted() {
            this.$on('session_creee', (session) => {
                window.noty({
                    message: 'Session créée avec succès',
                    type: 'success'
                })

                this.sessions.push(session)
            })

            this.$on('session_modifiee', (session) => {
                // on récupère l'index de session modifiée
                let sessionIndex = this.sessions.findIndex(s => {
                    return session.id == s.id
                })

                // TODO: Inserer la nouvelle session en fonction de son numéro d'ordre (dans le UPDATE)
                this.sessions.splice(sessionIndex, 1, session)
                window.noty({
                    message: 'Session modifiée avec succès',
                    type: 'success'
                })

            })

            SessionBus.$on('modifier_session', (upd_data) => {
                // Session modifiée à mettre à jour sur la liste
                if (this.chapitreid == upd_data.chapitreId) {
                    this.updateSession(upd_data.session)
                }
            })

            SessionBus.$on('session_to_add', (add_data) => {
                // Session créée à insérer sur la liste
                console.log('reception session_to_add',add_data)
                if (this.chapitreid == add_data.chapitreId) {
                    this.createSession(add_data.session)
                }
            })
        },
        components: {
            "creer-session": require('./children/CreerSession.vue').default
        },
        computed: {

        },
        methods: {
            creerNouvelleSession() {
                this.$emit('creer_session', this.chapitreid)
            },
            deleteSession(id, key) {
                if(confirm('Voulez-vous vraiment supprimer ?')) {
                    Axios.delete(`/admin/${this.chapitre_id}/sessions/${id}`)
                        .then(resp => {
                            this.sessions.splice(key, 1)
                            window.noty({
                                message: 'Session supprimée avec succès',
                                type: 'success'
                            })
                        }).catch(error => {
                        window.handleErrors(error)
                    })
                }
            },
            editSession(session) {
                let chapitreId = this.chapitre_id
                this.$parent.$emit('edit_session', { session, chapitreId })
            },
            updateSession(session) {
                // on récupère l'index de session modifiée
                let sessionIndex = this.sessions.findIndex(s => {
                    return session.id == s.id
                })

                // TODO: Inserer la nouvelle session en fonction de son numéro d'ordre (dans le UPDSATE)
                this.sessions.splice(sessionIndex, 1, session)
                window.noty({
                    message: 'Session modifiée avec succès',
                    type: 'success'
                })
            },
            createSession(session) {
                window.noty({
                    message: 'Session créée avec succès',
                    type: 'success'
                })

                this.sessions.push(session)
            }
        }
    }
</script>

<style scoped>

</style>
