@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ $niveau->imageniveau->fullpath }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Niveau: {{ $niveau->intitule }}</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="#">Niveaux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $niveau->intitule }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->


    <!-- START SECTION COURSES eduglobal_assets/images/course_img1.jpg -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <span class="sub_heading">Détails Niveau</span>
                            <h2>{{ $niveau->intitule }}</h2>
                        </div>
                        <p>{{ $niveau->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="course_list">
                        <div class="row">

                            @foreach ($niveau->classes as $classe)

                                <div class="col-md-6">
                                    <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                        <div class="content_img">
                                            <a href="#"><img style="height: 160px; width: 280px" src="{{ $classe->imageclasse->fullpath }}" alt="course_img1"/></a>
                                        </div>
                                        <div class="content_desc">
                                            <h4 class="content_title"><a href="{{ route('cours.byclasse', $classe->id) }}">{{ $classe->intitule }}</a></h4>
                                            <p>{{ $classe->description }}</p>
                                            <div class="courses_info">
                                                <div class="rating_stars">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </div>
                                                <ul class="list_none content_meta">
                                                    <li><a href="#" ><i class="ti-user"></i>31</a></li>
                                                    <li><a href="#"><i class="ti-heart"></i>10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="content_footer">
                                            <div class="teacher">

                                            </div>
                                            <div class="price">
                                                <span class="alert alert-success">{{ $classe->sigle }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COURSES -->

@endsection
