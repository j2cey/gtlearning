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
                        <input type="text" class="form-control" id="description" name="description" autocomplete="description" placeholder="Description" v-model="coursForm.description">
                        <span class="invalid-feedback d-block" role="alert" v-if="coursForm.errors.has('description')" v-text="coursForm.errors.get('description')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-sm" for="my-file">Select Image</label>
                    <div class="col-sm-10">
                        <input type="file" accept="image/*" @change="previewImage" class="form-control-file" id="my-file">
                        <div class="border p-2 mt-3">
                            <p>Image sélectionnée:</p>
                            <template v-if="preview">
                                <img :src="preview" class="imagePreviewWrapper" />
                                <p class="mb-0">nom fichier: {{ image.name }}</p>
                                <p class="mb-0">taille: {{ image.size/1024 }} KB</p>
                            </template>
                        </div>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" @click="close()">Fermer</button>
            <button type="button" class="btn btn-warning btn-sm" @click="updateCours()" :disabled="!isValidCreateForm" v-if="editing">Enregister</button>
            <button type="button" class="btn btn-warning btn-sm" @click="createCours()" :disabled="!isValidCreateForm" v-else>Enregister</button>
        </div>
        <!-- /.card-footer -->

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // eslint-disable-next-line no-unused-vars
    class Cours {
        constructor(cours) {
            this.id = cours.id || ''
            this.uuid = cours.uuid || ''
            this.intitule = cours.intitule || ''
            this.description = cours.description || ''
            this.status = cours.status || ''
            this.classe = cours.classe || ''
            this.image = cours.image || ''
        }
    }
    export default {
        name: "cours-create",
        props: {
            cours_prop: null
        },
        // eslint-disable-next-line vue/no-unused-components
        components: { Multiselect },
        mounted() {
            if (this.cours_prop == null) {
                console.log("cours_prop is null")
            } else {
                this.editing = true
                this.cours = new Cours(this.cours_prop)
                this.coursForm = new Form(this.cours)
                this.coursId = this.cours_prop.uuid
            }
        },
        created() {
            axios.get('/classes.fetch')
                .then(({data}) => this.classes = data);
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
                cours_image_filename: 'Télécharger une image',
                filefieldname: null,
                selectedFile : null,
                url: null,
                imageData: null,

                preview: null,
                image: null
            }
        },
        methods: {
            close() {
                if (this.cours_prop == null) {
                    window.location = '/courss'
                } else {
                    window.location = '/courss/' + this.cours.uuid
                }
            },
            clearForm() {
                this.coursForm = new Form(new Cours({}));
            },
            handleFileUpload(event) {
                this.selectedFile = event.target.files[0];
                this.filefieldname = event.target.name;
                this.cours_image_filename = (typeof this.selectedFile !== 'undefined') ? this.selectedFile.name : 'Télécharger une image';
                this.url = URL.createObjectURL(this.selectedFile);
            },
            chooseImage () {
                this.$refs.fileInput.click()
            },
            onSelectFile () {
                const input = this.$refs.fileInput
                const files = input.files
                if (files && files[0]) {
                    const reader = new FileReader
                    reader.onload = e => {
                        this.imageData = e.target.result
                    }
                    reader.readAsDataURL(files[0])
                    this.$emit('input', files[0])
                }
            },
            previewImage: function(event) {
                var input = event.target;
                if (input.files) {
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview = e.target.result;
                    }
                    this.image=input.files[0];
                    reader.readAsDataURL(input.files[0]);
                }
            },
            createCours() {
                this.coursForm
                    .post(`/courss`)
                    .then(data => {
                        //window.location = '/courss'
                        console.log("cours_created: ",data)

                        this.$swal({
                            title: 'Cours successfully created !',
                            text: 'Create a new One ?',
                            type: 'success',
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'No',
                            showLoaderOnConfirm: true
                        }).then((result) => {
                            if(result.value) {
                                this.clearForm();
                            } else {
                                window.location = '/courss'
                            }
                        })

                        // eslint-disable-next-line no-unused-vars
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateCours() {
                this.loading = true

                if (this.isSubcours) {

                    this.coursForm
                        .put(`/subcourss/${this.coursId}`, undefined)
                        .then(data => {
                            this.loading = false
                            this.$swal('Cours successful updated!', '', 'success').then(() => {
                                this.close()
                            })

                            // eslint-disable-next-line no-unused-vars
                        }).catch(error => {
                        this.loading = false
                    });

                } else {

                    this.coursForm
                        .put(`/courss/${this.coursId}`, undefined)
                        .then(data => {
                            this.loading = false
                            this.$swal('Cours successful updated!', '', 'success').then(() => {
                                this.close()
                            })

                            // eslint-disable-next-line no-unused-vars
                        }).catch(error => {
                        this.loading = false
                    });
                }
            },
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            }
        }
    }
</script>

<style scoped>
    .imagePreviewWrapper {
        width: 250px;
        height: 250px;
        display: block;
        cursor: pointer;
        margin: 0 auto 30px;
        background-size: cover;
        background-position: center center;
    }
</style>
