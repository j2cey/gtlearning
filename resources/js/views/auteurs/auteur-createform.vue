<template>
    <div class="card card-default">
        <!-- /.card-header -->
        <!-- card-body -->

        <div class="card-body">

            <form class="form-horizontal" @submit.prevent @keydown="auteurForm.errors.clear()">

                <div class="form-group row">
                    <label for="nom" class="col-sm-2 col-form-label text-sm">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" autocomplete="nom" placeholder="Nom" v-model="auteurForm.nom">
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('nom')" v-text="auteurForm.errors.get('nom')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prenom" class="col-sm-2 col-form-label text-sm">Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prenom" name="prenom" autocomplete="prenom" placeholder="Prénom" v-model="auteurForm.prenom">
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('prenom')" v-text="auteurForm.errors.get('prenom')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-sm">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" autocomplete="email" placeholder="Email" v-model="auteurForm.email">
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('email')" v-text="auteurForm.errors.get('email')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telephone" class="col-sm-2 col-form-label text-sm">Téléphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="telephone" placeholder="Téléphone" v-model="auteurForm.telephone">
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('telephone')" v-text="auteurForm.errors.get('telephone')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fonction" class="col-sm-2 col-form-label text-sm">Fonction</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fonction" name="fonction" autocomplete="fonction" placeholder="Fonction" v-model="auteurForm.fonction">
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('fonction')" v-text="auteurForm.errors.get('fonction')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="resume" class="col-sm-2 col-form-label text-sm">Résumé</label>
                    <div class="col-sm-10">
                        <textarea type="textarea" class="form-control" id="resume" name="resume" autocomplete="resume" placeholder="Résumé" v-model="auteurForm.resume">
                        </textarea>
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('resume')" v-text="auteurForm.errors.get('resume')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-sm"></label>
                    <div class="col-sm-10">
                        <div
                            class="base-image-input img-thumbnail"
                            :style="{ 'background-image': `url(${imageData})` }"
                            @click="chooseImage"
                        >
                            <span
                                v-if="!imageData"
                                class="placeholder"
                            >
                              Choisisez une Image
                            </span>
                            <input
                                class="file-input"
                                ref="fileInput"
                                type="file"
                                @input="onSelectFile"
                            >
                        </div>
                        <p v-if="imageData" class="mb-0 text-sm font-weight-light"><small>taille: {{ (imagesize/1024).toFixed(2) }} KB</small></p>
                        <span class="invalid-feedback d-block" role="alert" v-if="auteurForm.errors.has('imageauteur_file')" v-text="auteurForm.errors.get('imageauteur_file')"></span>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" @click="close()">Fermer</button>
            <button type="button" class="btn btn-warning btn-sm" @click="updateAuteur()" :disabled="!isValidCreateForm" v-if="editing">Modifier</button>
            <button type="button" class="btn btn-danger btn-sm" @click="deleteAuteur()" v-if="editing">Supprimer</button>
            <button type="button" class="btn btn-warning btn-sm" @click="createAuteur()" :disabled="!isValidCreateForm" v-else>Créer Auteur</button>
        </div>
        <!-- /.card-footer -->

    </div>
</template>

<script>
    import Multiselect from "vue-multiselect";
    import imageToBase64 from "image-to-base64/browser";

    class Auteur {
        constructor(auteur) {
            this.id = auteur.id || ''
            this.uuid = auteur.uuid || ''
            this.email = auteur.email || ''
            this.nom = auteur.nom || ''
            this.prenom = auteur.prenom || ''
            this.telephone = auteur.telephone || ''
            this.fonction = auteur.fonction || ''
            this.imageauteur = auteur.imageauteur || null
            this.resume = auteur.resume || ''
            this.status = auteur.status || ''
        }
    }
    export default {
        name: "auteur-createform",
        props: {
            auteur_prop: null
        },
        components: { Multiselect },
        beforeMount() {
            var auteur = JSON.parse(this.auteur_prop)
            if (this.auteur_prop == null) {
                this.auteur = null
            } else {
                if ( typeof auteur.imageauteur === 'undefined' || auteur.imageauteur === null ) {
                    console.log("imageauteur IS NULL: ", auteur.imageauteur)
                    this.imagesize = null
                } else {
                    console.log("imageauteur IS NOT NULL: ", auteur.imageauteur)
                    this.imagesize = auteur.imageauteur.size
                    this.generateImage64(auteur.imageauteur.fullpath, auteur.imageauteur.type)
                }
            }
        },
        mounted() {
            if (this.auteur_prop == null) {
                console.log("auteur-createform: auteur_prop is null", this.auteur_prop)
            } else {
                this.initAuteurForm(JSON.parse(this.auteur_prop))

                //this.imageData = this.auteur_prop.imagePath
                //this.generateBase64(this.auteur_prop.imagePath)
            }
        },
        created() {

        },
        data() {
            return {
                auteur: {},
                // eslint-disable-next-line no-undef
                auteurForm: new Form(new Auteur({})),
                auteurId: null,
                editing: false,
                loading: false,
                selectedImageauteur : null,
                url: null,
                imageData: null,
                imagesize: null
            }
        },
        methods: {
            close() {
                window.location = '/auteurs'
            },
            initAuteurForm(auteur) {
                this.editing = true
                this.auteur = new Auteur(auteur)
                this.auteurForm = new Form(auteur)
                this.auteurId = this.auteur.uuid
            },
            clearForm() {
                this.auteurForm = new Form(new Auteur({}));
            },
            chooseImage () {
                this.$refs.fileInput.click()
            },
            onSelectFile () {
                const input = this.$refs.fileInput
                const files = input.files
                if (files && files[0]) {
                    this.selectedImageauteur = files[0]
                    this.imagesize = this.selectedImageauteur.size
                    const reader = new FileReader
                    reader.onload = e => {
                        this.imageData = e.target.result
                    }
                    reader.readAsDataURL(files[0])
                    this.$emit('input', files[0])
                }
            },
            generateImage64 (path, imagetype) {
                //const imageToBase64 = require('image-to-base64');

                imageToBase64(path) // Path to the image
                    .then(
                        (response) => {
                            this.imageData = "data:" + imagetype + ";base64," + response
                        }
                    )
                    .catch(
                        (error) => {
                            console.log(error); // Logs an error if there was one
                        }
                    )
            },
            customLabelAuteur ({ nom, prenom }) {
                return `${nom} ${prenom}`
                // :custom-label="customLabelAuteur"
            },
            createAuteur() {
                this.loading = true

                const fd = new FormData();
                fd.append('imageauteur_file', this.selectedImageauteur);

                this.auteurForm
                    .post(`/auteurs`, fd)
                    .then(data => {

                        this.$swal({
                            title: 'Auteur créé avec succès !',
                            type: 'success',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            cancelButtonText: 'No',
                            showLoaderOnConfirm: true
                        }).then((result) => {
                            this.close()
                        })

                    }).catch(error => {
                    this.loading = false
                });
            },
            updateAuteur() {
                this.loading = true

                var fd = new FormData();

                if ( typeof this.selectedImageauteur === 'undefined' || this.selectedImageauteur === null) {
                    fd = undefined
                } else {
                    fd = new FormData();
                    fd.append('imageauteur_file', this.selectedImageauteur);
                }

                this.auteurForm
                    .put(`/auteurs/${this.auteurId}`, fd)
                    .then(data => {
                        this.loading = false
                        console.log('updateAuteur: ', data)
                        this.initAuteurForm(data)
                        window.noty({
                            message: 'Auteur modifié avec succès',
                            type: 'success'
                        })
                    }).catch(error => {
                    this.loading = false
                });
            },
            deleteAuteur() {
                this.$swal({
                    title: 'Supprimer l Auteur ?',
                    text: "Vous ne pourrez pas récupérer ces données !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui!'
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/auteurs/${this.auteur.uuid}`)
                            .then(resp => {
                                console.log(resp)
                                if (resp.data.status === "ok") {
                                    this.$swal(resp.data.message, '', 'success').then(() => {
                                        window.location = '/auteurs'
                                    })
                                } else {
                                    this.$swal.fire({
                                        icon: 'error',
                                        title: 'Suppression Impossible !',
                                        text: resp.data.message,
                                        footer: '<a href=/cours.byauteur/'+this.auteur.id+'>Accéder à ses cours ?</a>'
                                    }).then(() => {

                                    })
                                }
                            }).catch(error => {
                                window.handleErrors(error)
                        })
                    }
                })
            },
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            },
            base64image() {
                this.imageData
            }
        }
    }
</script>

<style scoped>
    .base-image-input {
        display: block;
        width: 200px;
        height: 200px;
        cursor: pointer;
        background-size: cover;
        background-position: center center;
    }
    .placeholder {
        background: #F0F0F0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #333;
        font-size: 18px;
        font-family: Helvetica;
    }
    .placeholder:hover {
        background: #E0E0E0;
    }
    .file-input {
        display: none;
    }
</style>
