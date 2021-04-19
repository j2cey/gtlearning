@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BANNER -->
    @include('layouts.eduglobal.parts.startsection_banner')
    <!-- END SECTION BANNER -->

    <!-- START SECTION ABOUT -->
{{--    @include('layouts.eduglobal.parts.startsection_about')--}}
    <!-- END SECTION ABOUT -->

    <!-- LISTE DES NIVEAUX -->
    @include('layouts.eduglobal.parts.section_liste_niveaux', ['niveaux' => $niveaux])
    <!-- FIN LISTE DES NIVEAUX -->

    <!-- START SECTION COURSES -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Nos Cours</h2>
                        </div>
                        <p>Quelques cours plus récents et mieux notés</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="course_list">
                        <div class="row">

                            @foreach ($cours as $cour)

                                <div class="col-md-6">

                                    <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                        <div class="content_img">
                                            <a href="#"><img src="{{ $cour->imagecours->fullpath }}" alt="course_img1"/></a>
                                        </div>
                                        <div class="content_desc">
                                            <h4 class="content_title"><a href="#">{{ $cour->intitule }}</a></h4>
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
                                                <a href="#"><img src="{{ asset('eduglobal_assets/images/user1.jpg') }}" alt="user1"><span>{{ $cour->auteur->personne->nomComplet }}</span></a>
                                            </div>
                                            <div class="price">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.07s">
                        <div class="medium_divider"></div>
                        <a href="/cours" class="btn btn-default rounded-0">Tous Les Course <i class="ion-ios-arrow-thin-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COURSES -->

@endsection
