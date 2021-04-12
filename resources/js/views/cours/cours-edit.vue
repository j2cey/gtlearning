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
                <cours-create-form :cours_prop="cours"></cours-create-form>
            </div>
            <div class="tab-pane fade" :class="{ 'active show': isActive('chapitres_tab') }" id="chapitres_tab">
                <cours-chapitres :chapitres_prop="cours.chapitres" ></cours-chapitres>
            </div>
            <button @click="setActive('cours_tab')">Test Switch Tab</button>
        </div>
    </div>
</template>

<script>
    import { getCoursItem } from './cours-service';

    export default {
        name: "cours-edit",
        props: {
            coursid: null
        },
        components: {
            coursCreateForm: () => import('./cours-createform'),
            coursChapitres: () => import('../chapitres/chapitre-list'),
        },
        data() {
            return {
                activeItem: 'cours_tab',
                cours_id: null,
                cours: null
            }
        },
        beforeMount() {

        },
        created() {
            console.log('cours.edit', this.coursid, this.$route.params.id)
            getCoursItem(this.$route.params.id).then(res => {
                this.cours = res;
            });
        },
        methods: {
            isActive (menuItem) {
                return this.activeItem === menuItem
            },
            setActive (menuItem) {
                this.activeItem = menuItem
            }
        }
    }
</script>

<style scoped>

</style>
