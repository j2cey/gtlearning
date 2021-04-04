@extends('layouts.eduglobal.app')

@section('content')

    <!-- START SECTION BANNER -->
    @include('layouts.eduglobal.parts.startsection_banner')
    <!-- END SECTION BANNER -->

    <!-- START SECTION ABOUT -->
    @include('layouts.eduglobal.parts.startsection_about')
    <!-- END SECTION ABOUT -->

    <!-- LISTE DES NIVEAUX -->
    @include('layouts.eduglobal.parts.section_liste_niveaux', ['niveaux' => $niveaux])
    <!-- FIN LISTE DES NIVEAUX -->

    <!-- START SECTION FEATURE -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Why Choose Us</h2>
                        </div>
                        <p>If you are going to use a passage of you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-book text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Books & Library</h5>
                            <p>If you are going to use a passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-globe text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Learn Courses Online</h5>
                            <p>If you are going to use a passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation"  data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-user-tie text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Expert Instructors</h5>
                            <p>If you are going to use passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation"  data-animation="fadeInUp" data-animation-delay="0.05s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-child text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Kids Education</h5>
                            <p>If you are going to use passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation"  data-animation="fadeInUp" data-animation-delay="0.06s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-headphones-alt text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>music Programs</h5>
                            <p>If you are going to use passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box icon_box_style1 animation"  data-animation="fadeInUp" data-animation-delay="0.07s">
                        <div class="box_icon mb-3">
                            <i class="fa fa-graduation-cap text_default"></i>
                        </div>
                        <div class="intro_desc">
                            <h5>Scholarship</h5>
                            <p>If you are going to use passage of anything embarrassing hidden in the middle of text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION FEATURE -->

    <!-- START SECTION VIDEO -->
    <section class="parallax_bg overlay_bg_70" data-parallax-bg-image="{{ asset('eduglobal_assets/images/video_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video_popup">
                            <span class="ripple"><i class="ion-play ml-1"></i></span>
                        </a>
                        <div class="mt-md-5 mt-4 text_white animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                            <h2>Video Tutorial For Our Campus</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION VIDEO -->

    <!-- START SECTION COURSES -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Our Courses</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="course_list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img1.jpg') }}" alt="course_img1"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user1.jpg') }}" alt="user1"><span>Alia Noor</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-success">Free</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img2.jpg') }}" alt="course_img2"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user2.jpg') }}" alt="user2"><span>Dany Core</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-info">$49</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img3.jpg') }}" alt="course_img3"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user3.jpg') }}" alt="user3"><span>Smith Parker</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-success">Free</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img4.jpg') }}" alt="course_img4"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user4.jpg') }}" alt="user4"><span>Sara Robert</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-info">$54</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.06s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img5.jpg') }}" alt="course_img5"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user5.jpg') }}" alt="user5"><span>Wendy Nahse</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-info">$36</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.07s">
                                    <div class="content_img">
                                        <a href="#"><img src="{{ asset('eduglobal_assets/images/course_img6.jpg') }}" alt="course_img6"/></a>
                                    </div>
                                    <div class="content_desc">
                                        <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
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
                                            <a href="#"><img src="{{ asset('eduglobal_assets/images/user6.jpg') }}" alt="user6"><span>John Wood</span></a>
                                        </div>
                                        <div class="price">
                                            <span class="alert alert-info">$22</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.07s">
                        <div class="medium_divider"></div>
                        <a href="#" class="btn btn-default rounded-0">View All Courses <i class="ion-ios-arrow-thin-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COURSES -->

    <!-- START SECTION EVENT -->
    <section class="overlay_bg_80 parallax_bg" data-parallaxSpeed="0.5" data-parallax-bg-image="{{ asset('eduglobal_assets/images/event_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center text_white animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 heading_light text-center">
                            <h2>Upcoming events</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="content_box event_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="content_img">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/event_img1.jpg') }}" alt="event_img1"/></a>
                            <div class="event_date">
                                <h5><span>16</span> May</h5>
                                <span class="event_time bg_default">10:00 am 3:00 pm</span>
                            </div>
                        </div>
                        <div class="content_desc bg-white">
                            <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                            <ul class="list_none content_meta">
                                <li><i class="ti-user"></i> <a href="#" class="text_default">John Wood</a></li>
                                <li><i class="ti-location-pin"></i><span class="text_default">New York City</span></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="content_box event_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        <div class="content_img">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/event_img2.jpg') }}" alt="event_img2"/></a>
                            <div class="event_date">
                                <h5><span>27</span> Apr</h5>
                                <span class="event_time bg_default">9:00 am 4:00 pm</span>
                            </div>
                        </div>
                        <div class="content_desc bg-white">
                            <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                            <ul class="list_none content_meta">
                                <li><i class="ti-user"></i> <a href="#" class="text_default">John Wood</a></li>
                                <li><i class="ti-location-pin"></i><span class="text_default">New York City</span></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="content_box event_box box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="content_img">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/event_img3.jpg') }}" alt="event_img3"/></a>
                            <div class="event_date">
                                <h5><span>22</span> Jun</h5>
                                <span class="event_time bg_default">11:00 am 4:00 pm</span>
                            </div>
                        </div>
                        <div class="content_desc bg-white">
                            <h4 class="content_title"><a href="#">Nullam id varius nunc id varius nunc</a></h4>
                            <ul class="list_none content_meta">
                                <li><i class="ti-user"></i> <a href="#" class="text_default">John Wood</a></li>
                                <li><i class="ti-location-pin"></i><span class="text_default">New York City</span></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure anything embarrassing hidden in the middle of text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- START SECTION EVENT -->

    <!-- START SECTION COUNTER -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="counter_icon">
                            <img src="{{ asset('eduglobal_assets/images/counter_icon_dark1.png') }}" alt="counter_icon1" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text"><span class="counter">1800</span>+</h3>
                            <p>Students</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        <div class="counter_icon">
                            <img src="{{ asset('eduglobal_assets/images/counter_icon_dark2.png') }}" alt="counter_icon2" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text"><span class="counter">70</span></h3>
                            <p>Courses</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="counter_icon">
                            <img src="{{ asset('eduglobal_assets/images/counter_icon_dark3.png') }}" alt="counter_icon3" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text"><span class="counter">700</span>+</h3>
                            <p>Certified teachers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 ">
                    <div class="box_counter counter_style1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                        <div class="counter_icon">
                            <img src="{{ asset('eduglobal_assets/images/counter_icon_dark4.png') }}" alt="counter_icon4" />
                        </div>
                        <div class="counter_content">
                            <h3 class="counter_text"><span class="counter">1200</span>+</h3>
                            <p>Award Winning</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COUNTER -->


    <!-- START SECTION TEACHER -->
    <section class="bg_gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <h2>Our Teachers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="team_box team_style2 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="team_img">
                            <img src="{{ asset('eduglobal_assets/images/team_img1.jpg') }}" alt="team1">
                        </div>
                        <div class="team_title text-center">
                            <h5><a href="#">Aden Smith</a></h5>
                            <span>Head Of Department</span>
                            <ul class="list_none social_icons">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_box team_style2 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        <div class="team_img">
                            <img src="{{ asset('eduglobal_assets/images/team_img2.jpg') }}" alt="team2">
                        </div>
                        <div class="team_title text-center">
                            <h5><a href="#">Kally Brooks</a></h5>
                            <span>Professor</span>
                            <ul class="list_none social_icons">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_box team_style2 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="team_img">
                            <img src="{{ asset('eduglobal_assets/images/team_img3.jpg') }}" alt="team3">
                        </div>
                        <div class="team_title text-center">
                            <h5><a href="#">David clark</a></h5>
                            <span>Chemistry Teacher</span>
                            <ul class="list_none social_icons">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_box team_style2 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                        <div class="team_img">
                            <img src="{{ asset('eduglobal_assets/images/team_img4.jpg') }}" alt="team4">
                        </div>
                        <div class="team_title text-center">
                            <h5><a href="#">Rebeka Alig</a></h5>
                            <span>English Teacher</span>
                            <ul class="list_none social_icons">
                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION TEACHER -->

    <!-- START SECTION TESTIMONIAL -->
    <section class="background_bg bg_fixed" data-img-src="{{ asset('eduglobal_assets/images/pattern_bg3.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Student Say!</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <div class="testimonial_slider testimonial_style2 carousel_slider owl-carousel owl-theme" data-margin="30" data-loop="true" data-autoplay="true" data-dots="false" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "576":{"items": "2"}, "1199":{"items": "3"}}'>
                        <div class="testimonial_box">
                            <div class="testimonial_img">
                                <img src="{{ asset('eduglobal_assets/images/client_img1.jpg') }}" alt="client">
                            </div>
                            <div class="testi_meta">
                                <div class="testi_user">
                                    <h6>Lissa Castro</h6>
                                    <span class="text_default">Co-Founder</span>
                                </div>
                                <div class="testi_desc">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, quaeillo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_box">
                            <div class="testimonial_img">
                                <img src="{{ asset('eduglobal_assets/images/client_img2.jpg') }}" alt="client">
                            </div>
                            <div class="testi_meta">
                                <div class="testi_user">
                                    <h6>Lissa Castro</h6>
                                    <span class="text_default">Co-Founder</span>
                                </div>
                                <div class="testi_desc">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, quaeillo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_box">
                            <div class="testimonial_img">
                                <img src="{{ asset('eduglobal_assets/images/client_img3.jpg') }}" alt="client">
                            </div>
                            <div class="testi_meta">
                                <div class="testi_user">
                                    <h6>Lissa Castro</h6>
                                    <span class="text_default">Co-Founder</span>
                                </div>
                                <div class="testi_desc">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, quaeillo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIAL -->

    <!-- START SECTION BLOG -->
    <section class="bg_gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <h2>Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('eduglobal_assets/images/blog_small_img1.jpg') }}" alt="blog_small_img1">
                                <div class="link_blog">
                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <h6 class="blog_title"><a href="#">Why are tickets to fly to Lagos expensive?</a></h6>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure there anything embarrassing hidden in the middle of text</p>
                            <a href="#" class="text-capitalize">Read More</a>
                        </div>
                        <div class="blog_footer bg-white">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i>15 May, 2019</a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('eduglobal_assets/images/blog_small_img2.jpg') }}" alt="blog_small_img2">
                                <div class="link_blog">
                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <h6 class="blog_title"><a href="#">Why are tickets to fly to Lagos expensive?</a></h6>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure there anything embarrassing hidden in the middle of text</p>
                            <a href="#" class="text-capitalize">Read More</a>
                        </div>
                        <div class="blog_footer bg-white">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i>23 May, 2019</a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{ asset('eduglobal_assets/images/blog_small_img3.jpg') }}" alt="blog_small_img3">
                                <div class="link_blog">
                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <h6 class="blog_title"><a href="#">Why are tickets to fly to Lagos expensive?</a></h6>
                            <p>If you are going to use a passage of Lorem Ipsum you need to be sure there anything embarrassing hidden in the middle of text</p>
                            <a href="#" class="text-capitalize">Read More</a>
                        </div>
                        <div class="blog_footer bg-white">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i>16 May, 2019</a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <div class="medium_divider"></div>
                        <a href="#" class="btn btn-default rounded-0">View All Blog <i class="ion-ios-arrow-thin-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BLOG -->

    <!-- START SECTION CLIENT LOGO -->
    <section class="light_gray_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Our Client</h2>
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                        <div class="small_divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="cl_logo_slider carousel_slider owl-carousel owl-theme" data-margin="15" data-loop="true" data-autoplay="true" data-dots="false" data-responsive='{"0":{"items": "2"}, "380":{"items": "3"}, "600":{"items": "4"}, "1000":{"items": "5"}, "1199":{"items": "6"}}'>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo1.png') }}" alt="cl_logo1"/></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo2.png') }}" alt="cl_logo2"/></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo3.png') }}" alt="cl_logo3"/></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo4.png') }}" alt="cl_logo4"/></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo5.png') }}" alt="cl_logo5"/></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="{{ asset('eduglobal_assets/images/cl_logo2.png') }}" alt="cl_logo2"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CLIENT LOGO -->

@endsection
