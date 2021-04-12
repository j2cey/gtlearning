<template>
    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('cours_tab')" :class="{ active: isActive('cours_tab') }" href="#cours_tab">Détails Cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('chapitres_tab')" :class="{ active: isActive('chapitres_tab') }" href="#chapitres_tab">Chapitres</a>
            </li>
        </ul>
        <div class="tab-content py-3" id="myTabContent">
            <div class="tab-pane fade" :class="{ 'active show': isActive('cours_tab') }" id="cours_tab">
                <cours-create-form :cours_prop="cours" v-on:courscree="coursCree"></cours-create-form>
            </div>
            <div class="tab-pane fade" :class="{ 'active show': isActive('chapitres_tab') }" id="chapitres_tab">
                <cours-chapitres :chapitres_prop="cours ? cours.chapitres : null" :coursid_prop="cours ? cours.id : null" ></cours-chapitres>
            </div>
        </div>
    </div>
</template>

<script>

    import CoursBus from './coursBus';

    export default {
        name: "cours-create",
        props: {
            cours_prop: null
        },
        components: {
            coursCreateForm: () => import('./cours-createform'),
            coursChapitres: () => import('../chapitres/chapitre-list'),
        },
        data() {
            return {
                activeItem: 'cours_tab',
                cours: {},
                chapitres: []
            }
        },
        beforeMount() {
        },
        mounted() {
            if (this.cours_prop == null) {
                this.cours = null
            } else {
                this.cours = JSON.parse(this.cours_prop)
            }
        },
        created() {
        },
        methods: {
            isActive (menuItem) {
                return this.activeItem === menuItem
            },
            setActive (menuItem) {
                this.activeItem = menuItem
            },
            coursCree(cours) {
                console.log('received courscree: ', cours)
                console.log('emit cours_cree: ')
                this.$emit('cours_cree', cours)
                this.setActive('chapitres_tab')
            }
        }
    }
</script>

<style scoped>

</style>
