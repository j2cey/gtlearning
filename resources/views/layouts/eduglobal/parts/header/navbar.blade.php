<div class="container">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/">
            <img class="logo_light" src="{{ asset('eduglobal_assets/images/Logo_Moov_Africa_Fond_Blanc_200x38.png') }}" alt="logo" />
            <img class="logo_dark" src="{{ asset('eduglobal_assets/images/Logo_Moov_Africa_Fond_Blanc_200x38.png') }}" alt="logo" />
            <img class="logo_default" src="{{ asset('eduglobal_assets/images/Logo_Moov_Africa_Fond_Blanc_200x38.png') }}" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Niveaux</a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a class="dropdown-item nav-link nav_item" href="/niveaux">Tous les Niveaux</a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="{{ route('niveaux.byid', 1) }}">Primaire</a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="{{ route('niveaux.byid', 2) }}">College</a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="{{ route('niveaux.byid', 3) }}">Lycée</a></li>
                            <li><a class="dropdown-item nav-link nav_item" href="{{ route('niveaux.byid', 4) }}">Supérieur</a></li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Cours</a>
                    <div class="dropdown-menu">
                        <ul>
                            @can('cours-create')
                                <li><a class="dropdown-item nav-link nav_item" href="/cours/create">Nouveau</a></li>
                            @endcan

                            <li><a class="dropdown-item nav-link nav_item" href="/cours">Tous Les Cours</a></li>
                            <li class="dropdown">
                                <a class="dropdown-item menu-link dropdown-toggler" href="#">Primaire</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 1) }}">CP 1</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 2) }}">CP 2</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 3) }}">CE 1</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 4) }}">CE 2</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 5) }}">CM 1</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 6) }}">CM 2</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-item menu-link dropdown-toggler" href="#">College</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 7) }}">6ème</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 8) }}">5ème</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 9) }}">4ème</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 10) }}">3ème</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-item menu-link dropdown-toggler" href="#">Lycée</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 11) }}">2nde</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 12) }}">1ère</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 13) }}">Tle</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-item menu-link dropdown-toggler" href="#">Supérieur</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 14) }}">DTS</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 15) }}">Licence</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('cours.byclasse', 16) }}">Master</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Auteurs</a>
                    <div class="dropdown-menu">
                        <ul>
                            @can('auteur-create')
                                <li><a class="dropdown-item nav-link nav_item" href="/auteurs/create">Créer</a></li>
                            @endcan
                            <li><a class="dropdown-item nav-link nav_item" href="/auteurs">Tous Les Auteurs</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav attr-nav align-items-center">
            <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="ion-ios-search-strong"></i></a>
                <div class="search-overlay">
                    <div class="search_wrap">
                        <form action="{{ route('cours.index') }}">
                            <input type="text" placeholder="Rechercher un cours" class="form-control" id="search_input" name="q">
                            <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
