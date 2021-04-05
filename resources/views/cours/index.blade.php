@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('uploads/cours/cours_default.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>Liste des Cours</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-sm-end">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tous Les Cours</li>
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
                        @include('PARTIALS.recherche_panel', ['search_route'=>"cours.index", 'search_route_param'=>''])
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($cours as $cour)

                    <div class="col-lg-4 col-sm-6">
                        <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                            <div class="content_img radius_ltrt_10">
                                <a href="#"><img src="{{ asset('uploads/cours/' . $cour->image ) }}" alt="course_img1"/></a>
                            </div>
                            <div class="content_desc">
                                <h4 class="content_title"><a href="{{ route('cours.lecture', $cour->id) }}">{{ $cour->intitule }}</a></h4>
                                <p>{{ $cour->description }}</p>
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
                                    <small>Auteur: </small> <a href="#"><span class="badge badge-secondary">Alia Noor</span></a>
                                </div>
                                <div class="price">
                                    <span class="alert alert-info">{{ $cour->classe->intitule }}</span>
                                </div>
                            </div>
                        </div>
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
