<template>
    <div class="card card-default">
        <!-- /.card-header -->
        <!-- card-body -->

        <div class="card-body">

            <form class="form-horizontal" @submit.prevent @keydown="coursForm.errors.clear()">

                <div class="form-group row">
                    <label for="intitule" class="col-sm-2 col-form-label text-sm">Intitulé</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="intitule" name="intitule" autocomplete="intitule" placeholder="Intitulé" v-model="coursForm.intitule">
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('intitule')" v-text="coursForm.errors.get('intitule')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="m_select_auteur" class="col-sm-2 col-form-label text-sm">Auteur</label>
                    <div class="col-sm-10">
                        <multiselect
                            id="m_select_auteur"
                            v-model="coursForm.auteur"
                            selected.sync="coursForm.auteur"
                            value=""
                            :options="auteurs"
                            :searchable="true"
                            :multiple="false"
                            track-by="id"
                            key="id"
                            placeholder="Auteur"
                            label="nomComplet"
                        >
                        </multiselect>
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('auteur')" v-text="coursForm.errors.get('auteur')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="m_select_classe" class="col-sm-2 col-form-label text-sm">Classe</label>
                    <div class="col-sm-10">
                        <multiselect
                            id="m_select_classe"
                            v-model="coursForm.classe"
                            selected.sync="coursForm.classe"
                            value=""
                            :options="classes"
                            :searchable="true"
                            :multiple="false"
                            label="intitule"
                            track-by="id"
                            key="id"
                            placeholder="Classe"
                        >
                        </multiselect>
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('classe')" v-text="coursForm.errors.get('classe')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-sm">Description</label>
                    <div class="col-sm-10">
                        <textarea type="textarea" class="form-control" id="description" name="description" autocomplete="description" placeholder="Description" v-model="coursForm.description">
                        </textarea>
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('description')" v-text="coursForm.errors.get('description')"></span>
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
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('imagecours_file')" v-text="coursForm.errors.get('imagecours_file')"></span>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" @click="close()">Fermer</button>
            <button type="button" class="btn btn-warning btn-sm" @click="updateCours()" :disabled="!isValidCreateForm" v-if="editing">Modifier</button>
            <button type="button" class="btn btn-danger btn-sm" @click="deleteCours()" v-if="editing">Supprimer</button>
            <button type="button" class="btn btn-warning btn-sm" @click="createCours()" :disabled="!isValidCreateForm" v-else>Créer Cours</button>
        </div>
        <!-- /.card-footer -->

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import imageToBase64 from 'image-to-base64/browser';

    // eslint-disable-next-line no-unused-vars
    class Cours {
        constructor(cours) {
            this.id = cours.id || ''
            this.uuid = cours.uuid || ''
            this.intitule = cours.intitule || ''
            this.description = cours.description || ''
            this.status = cours.status || ''
            this.auteur = cours.auteur || null
            this.classe = cours.classe || null
            this.imagecours = cours.imagecours || null
        }
    }
    export default {
        name: "cours-createform",
        props: {
            cours_prop: null
        },
        components: { Multiselect },
        beforeMount() {
            if (this.cours_prop === null) {
                this.cours = null
            } else {
                if ( typeof this.cours_prop.imagecours === 'undefined' || this.cours_prop.imagecours === null) {
                    this.imagesize = null
                } else {
                    this.imagesize = this.cours_prop.imagecours.size
                    this.generateImage64(this.cours_prop.imagecours.fullpath, this.cours_prop.imagecours.type)
                }
            }
        },
        mounted() {
            if (this.cours_prop == null) {
                console.log("cours-createform: cours_prop is null")
            } else {
                this.initCoursForm(this.cours_prop)

                //this.imageData = this.cours_prop.imagePath
                //this.generateBase64(this.cours_prop.imagePath)
            }
        },
        created() {
            axios.get('/classes.fetch')
                .then(({data}) => this.classes = data);

            axios.get('/auteurs.fetch')
                .then(({data}) => this.auteurs = data);
        },
        data() {
            return {
                cours: {},
                // eslint-disable-next-line no-undef
                coursForm: new Form(new Cours({})),
                coursId: null,
                editing: false,
                loading: false,
                classes: [],
                auteurs: [],
                selectedImagecours : null,
                url: null,
                imageData: null,
                imagesize: null
            }
        },
        methods: {
            close() {
                window.location = '/cours'
            },
            initCoursForm(cours) {
                this.editing = true
                this.cours = new Cours(cours)
                this.coursForm = new Form(cours)
                this.coursId = this.cours.uuid
            },
            clearForm() {
                this.coursForm = new Form(new Cours({}));
            },
            chooseImage () {
                this.$refs.fileInput.click()
            },
            onSelectFile () {
                const input = this.$refs.fileInput
                const files = input.files
                if (files && files[0]) {
                    this.selectedImagecours = files[0]
                    this.imagesize = this.selectedImagecours.size
                    const reader = new FileReader
                    reader.onload = e => {
                        this.imageData = e.target.result
                    }
                    reader.readAsDataURL(files[0])
                    this.$emit('input', files[0])
                }
            },
            generateBase64 (url) {
                let canvas = document.createElement('CANVAS')
                let img = document.createElement('img')
                img.src = url
                img.onload = () => {
                    canvas.height = img.height
                    canvas.width = img.width
                    canvas.size = img.size
                    this.imageData = canvas.toDataURL('image/jpeg')
                    canvas = null
                }
                img.onerror = error => {
                    this.error = 'Could not load image, please check that the file is accessible and an image!'
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
            createCours() {
                this.loading = true

                const fd = new FormData();
                fd.append('imagecours_file', this.selectedImagecours);

                this.coursForm
                    .post(`/cours`, fd)
                    .then(data => {

                        this.$swal({
                            title: 'Cours créé avec succès !',
                            text: 'Vous êtes invité à en compléter la structure',
                            type: 'success',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            cancelButtonText: 'No',
                            showLoaderOnConfirm: true
                        }).then((result) => {
                            //this.$emit('courscree', data);
                            window.location = '/cours/' + data.uuid + '/edit'
                        })

                    }).catch(error => {
                    this.loading = false
                });
            },
            updateCours() {
                this.loading = true

                var fd = new FormData();

                if ( typeof this.selectedImagecours === 'undefined' || this.selectedImagecours === null) {
                    fd = undefined
                } else {
                    fd = new FormData();
                    fd.append('imagecours_file', this.selectedImagecours);
                }

                this.coursForm
                    .put(`/cours/${this.coursId}`, fd)
                    .then(data => {
                        this.loading = false
                        this.initCoursForm(data)
                        window.noty({
                            message: 'Cours modifié avec succès',
                            type: 'success'
                        })
                    }).catch(error => {
                    this.loading = false
                });
            },
            deleteCours() {
                this.$swal({
                    title: 'Supprimer le Cours ?',
                    text: "Vous ne pourrez pas récupérer ces données !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui!'
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/cours/${this.cours.uuid}`)
                            .then(resp => {
                                this.$swal('Cours supprimé avec succès', '', 'success').then(() => {
                                    window.location = '/cours'
                                })
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
