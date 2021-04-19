@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('uploads/auteurs/auteurs_default.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Créer Nouvel Auteur</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Auteurs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tous Les Auteurs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->

    <!-- START SECTION CONTACT -->
    <section class="small_pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Créer Nouvel Auteur</h2>
                        </div>
                        <p>Ajouter un nouvel Auteur dans le Système.</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <auteur-create></auteur-create>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT -->

@endsection
