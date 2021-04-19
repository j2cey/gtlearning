@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ $classe->imageclasse->fullpath }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Liste des Cours - {{ $classe->intitule }}</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Classes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $classe->intitule }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->


    <!-- START SECTION COURSES -->
    <section class="small_pt">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        @include('PARTIALS.recherche_panel', ['search_route'=>"cours.byclasse", 'search_route_param'=>$classe->id])
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($cours as $cour)

                    <div class="col-lg-4 col-sm-6">
                        @include('cours.cours-item', ['cours' => $cour])
                    </div>

                @endforeach

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    {{ $cours->appends(request()->input())->links() }}
                </div>
            </div>

        </div>
    </section>
    <!-- END SECTION COURSES -->

@endsection
