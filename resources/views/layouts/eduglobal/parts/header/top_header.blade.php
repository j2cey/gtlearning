<div class="top-header light_skin">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <ul class="contact_detail list_none text-center text-md-left">
                    <li><a href="#"><i class="ti-mobile"></i>123-456-7890</a></li>
                    <li><a href="#"><i class="ti-email"></i>info@yourmail.com</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center mt-2 mt-md-0">
                    <ul class="list_none social_icons social_white text-center text-md-right">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                    <ul class="list_none header_list border_list ml-1">
                        @auth
                            <li>
                                <a href="#">Salut <strong>{{ auth()->user()->name  }}</strong></a>
                            </li>
                            <li>
                                <a href="javascript:{}" onclick="document.getElementById('logout-form').submit();">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf<a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </form>
                            </li>
                        @endauth

                        @guest
{{--                                <li><a href="#" data-toggle="modal" data-target="#Login">Login</a></li>--}}
                                <li><a href="javascript:;" data-toggle="modal" data-target="#loginModal">Se Connecter</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
