@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB eduglobal_assets/images/about_bg.jpg -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('uploads/niveaux/niveaux_default.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Tous les Niveaux</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Niveaux</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->


    <!-- START SECTION EVENT -->
    <section  class="staggered-animation-wrap overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Les Niveaux</h2>
                        </div>
                        <p>Les Niveaux regoupent des classes qui à leurs tours contiennent des cours. Cette page liste tous les niveaux disponibles sur le Site.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($niveaux as $niveau)

                    <div class="col-lg-4 col-sm-6">
                        <div class="content_box event_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                            <div class="content_img radius_ltrt_10">
                                <a href="{{ route('niveaux.show', $niveau->uuid) }}"><img src="{{ asset('uploads/niveaux/' . $niveau->image) }}" alt="event_img4"/></a>
                            </div>
                            <div class="content_desc">
                                <h4 class="content_title"><a href="{{ route('niveaux.show', $niveau->uuid) }}">{{ $niveau->intitule }}</a></h4>
                                <ul class="list_none content_meta">

                                </ul>
                                <p>{{ $niveau->description }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="ol_shape29">
            <div class="staggered-animation" data-animation="bounceInDown" data-animation-delay="0.1s">
                <img data-parallax='{"y": -50, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape29.png') }}" alt="shape29"/>
            </div>
        </div>
        <div class="ol_shape30">
            <div class="staggered-animation" data-animation="bounceInUp" data-animation-delay="0.2s">
                <img data-parallax='{"y": -50, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape30.png') }}" alt="shape30"/>
            </div>
        </div>
        <div class="ol_shape31">
            <div class="staggered-animation" data-animation="bounceInRight" data-animation-delay="0.3s">
                <img data-parallax='{"y": 50, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape31.png') }}" alt="shape31"/>
            </div>
        </div>
        <div class="ol_shape32">
            <div class="staggered-animation" data-animation="bounceInUp" data-animation-delay="0.4s">
                <img data-parallax='{"y": -50, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape32.png') }}" alt="shape32"/>
            </div>
        </div>
        <div class="ol_shape33">
            <div class="staggered-animation" data-animation="bounceInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": -50, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape33.png') }}" alt="shape33"/>
            </div>
        </div>
        <div class="ol_shape34">
            <div class="staggered-animation" data-animation="bounceInDown" data-animation-delay="0.6s">
                <img data-parallax='{"x": 100, "smoothness": 20}' src="{{ asset('eduglobal_assets/images/shape34.png') }}" alt="shape34"/>
            </div>
        </div>
    </section>
    <!-- START SECTION EVENT -->

@endsection
