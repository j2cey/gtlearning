<template>
    <div class="modal fade draggable" id="addUpdateSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="editing">Modifer Session</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-else>Céer Nouvelle Session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" @submit.prevent @keydown="sessionForm.errors.clear()">

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="intitule" class="col-sm-2 col-form-label">Intitulé</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="intitule" name="intitule" autocomplete="intitule" autofocus placeholder="Intitulé" v-model="sessionForm.intitule">
                                    <span class="invalid-feedback d-block" role="alert" v-if="sessionForm.errors.has('intitule')" v-text="sessionForm.errors.get('intitule')"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label text-sm">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="textarea" class="form-control" id="description" name="description" autocomplete="description" placeholder="Description" v-model="sessionForm.description"></textarea>
                                    <span class="invalid-feedback d-block" role="alert" v-if="sessionForm.errors.has('description')" v-text="sessionForm.errors.get('description')"></span>
                                </div>
                            </div>

                            <div class="form-group input-group file-group">
                                <label for="lien_video" class="col-sm-2 col-form-label text-sm text-left">Vidéo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="lien_video" id="lien_video" ref="lien_video" @change="handleFile" multiple>
                                    <p class="text-sm-left"><small class="text text-danger" role="alert" v-if="sessionForm.errors.has('lien_video')" v-text="sessionForm.errors.get('lien_video')"></small></p>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
                <div class="card-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="updateSession(chapitreId)" :disabled="!isValidCreateForm" v-if="editing">Enregister</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="createSession(chapitreId)" :disabled="!isValidCreateForm" v-else>Créer Session</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
    import SessionBus from './sessionBus'

    class Session {
        constructor(session) {
            this.intitule = session.intitule || ''
            this.description = session.description || ''
            this.posi = session.posi || ''
            this.chapitre_id = session.chapitre_id || ''
        }
    }
    export default {
        name: "session-create",
        components: {  },
        mounted() {
            SessionBus.$on('create_session', (chapitreId) => {
                console.log('create_session', chapitreId)
                this.editing = false
                this.chapitreId = chapitreId
                this.session = new Session({})
                this.session.chapitre_id = chapitreId
                this.sessionForm = new Form(this.session)
                $('#addUpdateSession').modal()
            })
            SessionBus.$on('edit_session', (session) => {
                this.editing = true
                this.chapitreId = session.chapitre_id

                this.session = new Session(session)
                this.sessionForm = new Form(this.session)
                this.sessionId = session.uuid
                $('#addUpdateSession').modal()
            })
        },
        data() {
            return {
                session: {},
                sessionForm: new Form(new Session({})),
                chapitreId: null,
                editing: false,
                loading: false,
                sessionId: null,
                selectedVideo: null
            }
        },

        methods: {
            handleFile(event) {
                this.selectedVideo = event.target.files[0];
            },
            createSession(chapitreId) {
                this.loading = true

                const fd = new FormData();
                fd.append('video_file', this.selectedVideo);

                this.sessionForm
                    .post('/sessions', fd)
                    .then(session => {
                        this.loading = false
                        SessionBus.$emit('session_created', {session, chapitreId})
                        $('#addUpdateSession').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateSession(chapitreId) {
                this.loading = true
                this.sessionForm
                    .put(`/sessions/${this.sessionId}`, undefined)
                    .then(session => {
                        this.loading = false
                        SessionBus.$emit('session_updated', {session, chapitreId})
                        $('#addUpdateSession').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            }
        },
        computed: {
            isValidCreateForm() {
                return this.sessionForm.intitule && this.sessionForm.description && !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
