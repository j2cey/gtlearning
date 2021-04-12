<template>
    <div class="modal fade draggable" id="addUpdateChapitre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="editing">Modifer Chapitre</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-else>Céer Nouveau Chapitre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" @submit.prevent @keydown="chapitreForm.errors.clear()">

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="intitule" class="col-sm-2 col-form-label">Intitulé</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="intitule" name="intitule" autocomplete="intitule" autofocus placeholder="Intitulé" v-model="chapitreForm.intitule">
                                    <span class="invalid-feedback d-block" role="alert" v-if="chapitreForm.errors.has('intitule')" v-text="chapitreForm.errors.get('intitule')"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label text-sm">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="textarea" class="form-control" id="description" name="description" autocomplete="description" placeholder="Description" v-model="chapitreForm.description"></textarea>
                                    <span class="invalid-feedback d-block" role="alert" v-if="chapitreForm.errors.has('description')" v-text="chapitreForm.errors.get('description')"></span>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
                <div class="card-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="updateChapitre(courId)" :disabled="!isValidCreateForm" v-if="editing">Enregister</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="createChapitre(courId)" :disabled="!isValidCreateForm" v-else>Créer Chapitre</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import ChapitreBus from './chapitreBus'

    class Chapitre {
        constructor(chapitre) {
            this.intitule = chapitre.intitule || ''
            this.description = chapitre.description || ''
            this.posi = chapitre.posi || ''
            this.cour_id = chapitre.cour_id || ''
        }
    }
    export default {
        name: "chapitre-create",
        components: { Multiselect },
        mounted() {
            ChapitreBus.$on('create_chapitre', (courId) => {
                console.log('create_chapitre', courId)
                this.editing = false
                this.courId = courId
                this.chapitre = new Chapitre({})
                this.chapitre.cour_id = courId
                this.chapitreForm = new Form(this.chapitre)
                $('#addUpdateChapitre').modal()
            })
            ChapitreBus.$on('edit_chapitre', (chapitre) => {
                this.editing = true
                this.courId = chapitre.cour_id

                this.chapitre = new Chapitre(chapitre)
                this.chapitreForm = new Form(this.chapitre)
                this.chapitreId = chapitre.uuid
                $('#addUpdateChapitre').modal()
            })
        },
        data() {
            return {
                chapitre: {},
                chapitreForm: new Form(new Chapitre({})),
                courId: null,
                editing: false,
                loading: false,
                chapitreId: null
            }
        },

        methods: {
            createChapitre(courId) {
                this.loading = true
                this.chapitreForm
                    .post('/chapitres')
                    .then(chapitre => {
                        this.loading = false
                        ChapitreBus.$emit('chapitre_created', {chapitre, courId})
                        $('#addUpdateChapitre').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateChapitre(courId) {
                this.loading = true
                this.chapitreForm
                    .put(`/chapitres/${this.chapitreId}`, undefined)
                    .then(chapitre => {
                        this.loading = false
                        ChapitreBus.$emit('chapitre_updated', {chapitre, courId})
                        $('#addUpdateChapitre').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            }
        },
        computed: {
            isValidCreateForm() {
                return this.chapitreForm.intitule && this.chapitreForm.description && !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
