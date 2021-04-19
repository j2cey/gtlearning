<template>
    <div class="container">

        <table class="table table-hover table-sm">
            <tbody>

                <tr v-for="(session, index) in sessions" v-if="sessions">
                    <td>
                        <a @click="editSession(session)"><small>{{ session.intitule }}</small></a>
                    </td>
                    <td>
                        <small>
                            <span class="badge badge-info"><span class="fa fa-clock"></span> {{ session.videosession.duration_mm + ':' + session.videosession.duration_ss }} </span>
                        </small>
                    </td>
                    <td>
                        <small>
                            <a class="btn btn-xs" @click="editSession(session)">
                                <i class="ti-pencil-alt" style="color:green"></i>
                            </a>
                            <a class="btn btn-xs" @click="deleteSession(session)">
                                <i class="ti-trash" style="color:red"></i>
                            </a>
                        </small>
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
                chapitreId: this.chapitreid_prop
            }
        },
        mounted() {
            SessionBus.$on('session_created', (add_data) => {
                if (this.chapitreId === add_data.chapitreId) {
                    console.log('session_created received: ', add_data)
                    this.addSession(add_data.session)
                }
            })

            SessionBus.$on('session_updated', (upd_data) => {
                if (this.chapitreId === upd_data.chapitreId) {
                    this.updateSession(upd_data.session)
                }
            })
        },
        components: {
            "creer-session": require('./session-create').default
        },
        computed: {

        },
        methods: {
            creerNouvelleSession() {
                this.$emit('creer_session', this.chapitreid)
            },
            deleteSession(session) {
                this.$swal({
                    title: 'Supprimer la Session ?',
                    text: "Vous ne pourrez pas récupérer ces données !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui!'
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/sessions/${session.uuid}`)
                            .then(resp => {
                                this.removeSession(session)
                            }).catch(error => {
                            window.handleErrors(error)
                        })
                    }
                })
            },
            editSession(session) {
                SessionBus.$emit('edit_session', session)
            },
            addSession(session) {
                let sessionIndex = this.sessions.findIndex(s => {
                    return session.id === s.id
                })
                // if this session does not already exists, it is inserted in the list
                if (sessionIndex === -1) {
                    window.noty({
                        message: 'Session créée avec succès',
                        type: 'success'
                    })
                    this.sessions.push(session)
                }
            },
            updateSession(session) {
                // we get the index of the modified session
                let sessionIndex = this.sessions.findIndex(s => {
                    return session.id === s.id
                })
                this.sessions.splice(sessionIndex, 1, session)
                window.noty({
                    message: 'Session modifiée avec succès',
                    type: 'success'
                })
            },
            removeSession(session) {
                let sessionIndex = this.sessions.findIndex(s => {
                    return session.id === s.id
                })
                // if this session exists, it is removed from list
                if (sessionIndex !== -1) {
                    window.noty({
                        message: 'Session supprimée avec succès',
                        type: 'success'
                    })
                    this.chapitres.splice(sessionIndex, 1)
                }
            },
        }
    }
</script>

<style scoped>

</style>
