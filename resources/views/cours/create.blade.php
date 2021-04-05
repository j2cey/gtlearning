@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('uploads/cours/cours_default.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Créer Nouveau Cours</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Cours</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tous Les Cours</li>
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
                            <h2>Créer Nouveau Cours</h2>
                        </div>
                        <p>Créer le nouveau Cours envue de sa structuration par la suite.</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <cours-create></cours-create>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT -->

@endsection
