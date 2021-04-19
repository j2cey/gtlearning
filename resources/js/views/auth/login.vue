<template>
    <div class="modal fade lr_popup" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <img class="h-100 background_bg radius_ltlb_5" src="/eduglobal_assets/images/login_img.jpg"/>
                        </div>
                        <div class="col-lg-7">
                            <div class="padding_eight_all">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="login-tab1" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                                        <form>
                                            <ul class="alert alert-danger" v-if="errors.length > 0">
                                                <p class="text-center" v-for="error in errors" :key="errors.indexOf(error)">
                                                    {{ error }}
                                                </p>
                                            </ul>
                                            <div class="form-group">
                                                <input type="text" required="" class="form-control" name="email" placeholder="Email" v-model="email">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" required="" type="password" name="password" placeholder="Mot de Passe" v-model="password" @keyup.enter="attemptLogin()">
                                            </div>
                                            <div class="login_footer form-group">
                                                <a href="#">Mot de passe oublié?</a>
                                                <div class="chek-form mb-3">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                                        <label class="form-check-label" for="exampleCheckbox3">Se souvenir de moi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-default btn-block rounded-0" name="login" @click="attemptLogin()" :disabled="!isValidLoginForm">Valider</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="signup" role="tabpanel">
                                        <div class="heading_s1 mb-3">
                                            <h4>Sign Up</h4>
                                        </div>
                                        <form method="post" class="login form_style2">
                                            <div class="form-group">
                                                <input type="text" required="" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" required="" type="password" name="cpassword" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default btn-block rounded-0" name="login">Sign Up</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from "axios";

    export default {
        name: "login",
        data() {
            return {
                email: '',
                password: '',
                remember: true,
                loading: false,
                errors: []
            }
        },

        methods: {
            emailIsValid()   {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))  {
                    return true
                } else {
                    return false
                }
            },
            attemptLogin() {
                this.errors = []
                this.loading = true
                axios.post('/login', {
                    email: this.email, password: this.password, remember: this.remember
                }).then(resp => {
                    // Tout s'est bien passé, alors on actualise la page actuelle
                    $('#loginModal').modal('hide')
                    location.reload()
                }).catch(error => {
                    this.loading = false
                    if(error.response.status === 422) {
                        console.log(error.data)
                        this.errors.push("Nous n'avons pas pu vérifier les détails de votre compte.")
                    } else {
                        this.errors.push("Une erreur s'est produite, veuillez actualiser et réessayer.")
                    }
                })
            }
        },

        computed: {
            isValidLoginForm() {
                return this.emailIsValid() && this.password && !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
