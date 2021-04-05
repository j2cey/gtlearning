@extends('layouts.eduglobal.app')

@section('content')

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="{{ asset('uploads/cours/' . $cours->image) }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h1>Lecture Cours - {{ $cours->intitule }}</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Cours</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $cours->intitule }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->


<!-- START SECTION COURSE DETAIL -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single_course">
                    <div class="embed-responsive embed-responsive-16by9 col-xs-12 text-center">

                        <!-- TODO: lire la 1ère session du cours par défaut -->
                        <router-view ></router-view>

                        <div class="enroll_btn">
                            @can('cours-edit')
                            <a href="#" class="btn btn-default btn-sm">Modifier</a>
                            @endcan
                        </div>

                    </div>
                    <div class="course_detail alert-warning">
                        <div class="course_title">
                            <h2>{{ $cours->intitule }}</h2>
                        </div>
                        <div class="countent_detail_meta text-sm">
                            <ul>
                                <li>
                                    <div class="instructor">
                                        <img src="{{ asset('eduglobal_assets/images/user1.jpg') }}" alt="user1">
                                        <div class="instructor_info">
                                            <label>Auteur:</label>
                                            <a href="#">{{ $cours->auteur->personne->nomComplet }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course_cat">
                                        <label>Niveau, Classe: </label>
                                        <a href="#">{{ $cours->classe->niveau->intitule }}</a><a href="#">{{ $cours->classe->intitule }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="course_student">
                                        <label>Vues: </label>
                                        <span> 352</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="course_categories">
                                        <label>Note: </label>
                                        <div class="rating_stars">
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star-half"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-4 mt-lg-0 mt-4 pt-3 pt-lg-0">
                <div class="sidebar">

                    <div class="course_tabs">
                        <ul class="nav nav-tabs p-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab1" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true"><small>Résumé</small></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab1" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false"><small>Contenu</small></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab1" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"><small>Notes</small></a>
                            </li>
                        </ul>
                        <div class="tab-content" style="height:500px; overflow-y: scroll;">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab1">
                                <div class="border radius_all_5 tab_box"> <p class="small">{{ $cours->description }}</p></div>
                            </div>
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab1">
                                <div id="accordion-chap" class="accordion">

                                    @foreach ($cours->chapitres as $chapitre)
                                        <div class="card">
                                            <div class="card-header" id="heading-chap-{{ $chapitre->id }}">
                                                <h6 class="mb-0">
                                                    @if ($loop->first)
                                                        <a data-toggle="collapse" href="#clpse-chap-{{ $chapitre->id }}" aria-expanded="true" aria-controls="clpse-chap-{{ $chapitre->id }}"><small>{{ $chapitre->intitule }}</small></a>
                                                    @else
                                                        <a class="collapsed" data-toggle="collapse" href="#clpse-chap-{{ $chapitre->id }}" aria-expanded="false" aria-controls="clpse-chap-{{ $chapitre->id }}"><small>{{ $chapitre->intitule }}</small></a>
                                                    @endif
                                                </h6>
                                                <small>
                                                    <span class="item_meta duration">30 min</span>
                                                </small>
                                            </div>
                                            @if ($loop->first)
                                                <div id="clpse-chap-{{ $chapitre->id }}" class="collapse show" aria-labelledby="heading-chap-{{ $chapitre->id }}" data-parent="#accordion-chap">
                                            @else
                                                <div id="clpse-chap-{{ $chapitre->id }}" class="collapse" aria-labelledby="heading-chap-{{ $chapitre->id }}" data-parent="#accordion-chap">
                                            @endif
                                                <div class="card-body">
                                                    <p class="small">{{ $chapitre->description }}</p>

                                                    <table class="table table-hover table-sm">
                                                        <tbody>
                                                        @forelse ($chapitre->sessions as $session)
                                                            <tr>
                                                                <td>
                                                                    <router-link tag="a" to="/sessions/play/{{$session->lien}}" class="nav-link">
                                                                        <small>{{ $session->intitule }}</small>
                                                                    </router-link>
                                                                </td>
                                                                <td>
                                                                    <small>
                                                                    <span class="badge badge-info"><span class="fa fa-clock"></span> {{ $session->duree_mm }}:{{ $session->duree_ss }}</span>
                                                                    </small>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab1">
                                <div class="border radius_all_5 tab_box">
                                    <div class="course_rating">
                                        <div class="rating_review">
                                            <p>
                                                <span class="display-4 font-weight-light">4.5</span>
                                                <small>moyenne basée sur 2 notes</small>
                                            </p>
                                            <div class="rating_stars">
                                                <small>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="rating_box">
                                            <div class="course_rate">
                                                <small>
                                                    <span>5 Star</span>
                                                    <div class="review_bar">
                                                        <div class="rating" style="width:90% "></div>
                                                    </div>
                                                    <span>90%</span>
                                                </small>
                                            </div>
                                            <div class="course_rate">
                                                <small>
                                                    <span>4 Star</span>
                                                    <div class="review_bar">
                                                        <div class="rating" style="width:70% "></div>
                                                    </div>
                                                    <span>70%</span>
                                                </small>
                                            </div>
                                            <div class="course_rate">
                                                <small>
                                                    <span>3 Star</span>
                                                    <div class="review_bar">
                                                        <div class="rating" style="width:40% "></div>
                                                    </div>
                                                    <span>40%</span>
                                                </small>
                                            </div>
                                            <div class="course_rate">
                                                <small>
                                                    <span>2 Star</span>
                                                    <div class="review_bar">
                                                        <div class="rating" style="width:20% "></div>
                                                    </div>
                                                    <span>20%</span>
                                                </small>
                                            </div>
                                            <div class="course_rate">
                                                <small>
                                                    <span>1 Star</span>
                                                    <div class="review_bar">
                                                        <div class="rating" style="width:10% "></div>
                                                    </div>
                                                    <span>10%</span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="heading_s1">
                                        <h5>Commentaires</h5>
                                    </div>
                                    <ul class="list_none comment_list">
                                        <li class="comment_info">
                                            <div class="d-flex">
                                                <div class="user_img">
                                                    <img class="radius_all_5" src="{{ asset('eduglobal_assets/images/client_img1.jpg') }}" alt="client_img1">
                                                </div>
                                                <div class="comment_content">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="meta_data">
                                                            <h6><a href="#">Alia Noor</a></h6>
                                                            <div class="comment-time"><small>March 5, 2018, 6:05 PM</small></div>
                                                            <div class="ml-auto mb-2">
                                                                <div class="rating_stars">
                                                                    <small>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star-half"></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="small">We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment_info">
                                            <div class="d-flex">
                                                <div class="user_img">
                                                    <img class="radius_all_5" src="{{ asset('eduglobal_assets/images/client_img2.jpg') }}" alt="client_img2">
                                                </div>
                                                <div class="comment_content">
                                                    <div class="d-sm-flex align-items-center">
                                                        <div class="meta_data">
                                                            <h6><a href="#">Dany Core</a></h6>
                                                            <div class="comment-time"><small>april 15, 2018, 10:30 PM</small></div>
                                                            <div class="ml-auto mb-2">
                                                                <div class="rating_stars">
                                                                    <small>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star"></i>
                                                                        <i class="ion-android-star-half"></i>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="small">We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble that.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="review_form field_form">
                                        <h3>Laisser un commentaire</h3>
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <div class="rating">
                                                        <span data-value="1"><i class="ion-android-star-outline"></i></span>
                                                        <span data-value="2"><i class="ion-android-star-outline"></i></span>
                                                        <span data-value="3"><i class="ion-android-star-outline"></i></span>
                                                        <span data-value="4"><i class="ion-android-star-outline"></i></span>
                                                        <span data-value="5"><i class="ion-android-star-outline"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <textarea required="required" placeholder="Votre Commentaire *" class="form-control" name="message" rows="4"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input required="required" placeholder="Nom *" class="form-control" name="name" type="text">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input required="required" placeholder="Email *" class="form-control" name="email" type="email">
                                                </div>

                                                <div class="form-group col-12">
                                                    <button type="submit" class="btn btn-default" name="submit" value="Submit">Poster Commentaire</button>
                                                </div>
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
</section>
<!-- END SECTION COURSE DETAIL -->

@endsection
