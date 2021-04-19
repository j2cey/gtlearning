<div class="modal fade lr_popup" id="Login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="h-100 background_bg radius_ltlb_5" data-img-src="{{ asset('eduglobal_assets/images/login_img.jpg') }}"></div>
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
                                    <form method="POST" class="login form_style2" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="password" name="password" placeholder="Mot de Passe">
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
                                            <button type="submit" class="btn btn-default btn-block rounded-0" name="login">Valider</button>
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
