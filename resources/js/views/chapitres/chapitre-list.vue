<template>
    <div class="container">

        <h1 class="text-center">
            <button class="btn btn-sm btn-primary" @click="creerNouveauChapitre(courId)" v-if="courId">
                <i class="fa fa-plus" aria-hidden="true"></i> Chapitre
            </button>
        </h1>

        <div id="accordion-chap" class="accordion">
            <div class="card" v-for="(chapitre, index) in chapitres" v-if="chapitres">

                <div class="card-header" :id="'heading-chap-'+chapitre.id">
                    <h6 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" :href="'#clpse-chap-'+chapitre.id" aria-expanded="false" :aria-controls="'clpse-chap-'+chapitre.id"><small>{{ chapitre.intitule }}</small></a>
                    </h6>
                    <small>
                        <span class="item_meta duration text-sm">
                            {{ chapitre.duree }}
                        </span>
                    </small>
                </div>
                <div :id="'clpse-chap-'+chapitre.id" class="collapse" :aria-labelledby="'heading-chap-'+chapitre.id" data-parent="#accordion-chap">
                    <div class="card-body">
                        <p class="small">{{ chapitre.description }}</p>
                        <br />
                        <p>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary btn-xs" @click="editChapitre(chapitre)"><i class="ti-pencil-alt"></i> Chapitre</button>
                                <button type="button" class="btn btn-outline-danger btn-xs" @click="deleteChapitre(chapitre)"><i class="ti-trash" aria-hidden="true"></i> Chapitre</button>
                                <button type="button" class="btn btn-outline-success btn-xs" @click="createSession(chapitre.id, index)"><i class="ti-plus" aria-hidden="true"></i> Session</button>
                            </div>
                        </p>

                        <div class="row">
                            <session-list :sessions_prop="chapitre ? chapitre.sessions: null" :chapitreid_prop="chapitre ? chapitre.id: null"></session-list>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <create-chapitre></create-chapitre>
        <create-session></create-session>
    </div>
</template>

<script>
    import ChapitreBus from './chapitreBus'
    import SessionBus from '../sessions/sessionBus'

    export default {
        name: "chapitre-list",
        props: {
            chapitres_prop: null,
            coursid_prop: null
        },
        components: {
            CreateChapitre: () => import('./chapitre-create'),
            SessionList: () => import('../sessions/session-list'),
            CreateSession: () => import('../sessions/session-create'),
        },
        mounted() {
            this.$parent.$on('cours_cree', (cours) => {
                console.log('received cours_cree: ', cours)
                this.courId = cours.id
            })

            ChapitreBus.$on('chapitre_created', (add_data) => {
                if (this.courId === add_data.courId) {
                    this.addChapitre(add_data.chapitre)
                }
            })

            ChapitreBus.$on('chapitre_updated', (upd_data) => {
                if (this.courId === upd_data.courId) {
                    this.updateChapitre(upd_data.chapitre)
                }
            })

            SessionBus.$on('session_created', (add_data) => {
                axios.get(`/chapitres.byid/${add_data.chapitreId}`)
                    .then(({data}) => {
                        if (this.courId === data.cour_id) {
                            this.updateChapitre(data)
                        }
                    });
            })

            SessionBus.$on('session_updated', (upd_data) => {
                axios.get(`/chapitres.byid/${upd_data.chapitreId}`)
                    .then(({data}) => {
                        if (this.courId === data.cour_id) {
                            this.updateChapitre(data)
                        }
                    });
            })
        },
        data() {
            return {
                chapitres: this.chapitres_prop,
                courId: this.coursid_prop
            }
        },
        methods: {
            creerNouveauChapitre(courId) {
                ChapitreBus.$emit('create_chapitre', courId)
            },
            editChapitre(chapitre) {
                ChapitreBus.$emit('edit_chapitre', chapitre)
            },
            updateChapitre(chapitre) {
                // we get the index of the modified chapitre
                let chapitreIndex = this.chapitres.findIndex(c => {
                    return chapitre.id === c.id
                })
                // if this chapitre does exists, it is updated from the list
                if (chapitreIndex !== -1) {
                    this.chapitres.splice(chapitreIndex, 1, chapitre)
                    window.noty({
                        message: 'Chapitre modifié avec succès',
                        type: 'success'
                    })
                }
            },
            addChapitre(chapitre) {
                let chapitreIndex = this.chapitres.findIndex(c => {
                    return chapitre.id === c.id
                })
                // if this chapitre does not already exists, it is inserted in the list
                if (chapitreIndex === -1) {
                    window.noty({
                        message: 'Chapitre créé avec succès',
                        type: 'success'
                    })
                    this.chapitres.push(chapitre)
                }
            },
            deleteChapitre(chapitre, index) {
                this.$swal({
                    title: 'Supprimer le Chapitre ?',
                    text: "Vous ne pourrez pas récupérer ces données !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui!'
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/chapitres/${chapitre.uuid}`)
                            .then(resp => {
                                this.removeChapitre(chapitre)
                            }).catch(error => {
                            window.handleErrors(error)
                        })
                    }
                })
            },
            removeChapitre(chapitre) {
                let chapitreIndex = this.chapitres.findIndex(c => {
                    return chapitre.id === c.id
                })
                // if this chapitre exists, it is removed from list
                if (chapitreIndex !== -1) {
                    window.noty({
                        message: 'Chapitre supprimé avec succès',
                        type: 'success'
                    })
                    this.chapitres.splice(chapitreIndex, 1)
                }
            },
            createSession(chapitreId, index) {
                SessionBus.$emit('create_session', chapitreId)
            }
        }
    }
</script>

<style scoped>
    .chapitre_widget {
        padding: 4px 8px;
        border-radius: 3px;
        position: absolute;
        right: 20px;
        font-size: 10px;
        top: 1px;
    }
</style>
