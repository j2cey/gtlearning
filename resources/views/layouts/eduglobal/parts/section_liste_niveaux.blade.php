<section class="bg_blue_dark background_bg " data-img-src="{{ asset('eduglobal_assets/images/pattern_bg2.png') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center text_white animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 heading_light text-center">
                        <h2>Les Niveaux</h2>
                    </div>
                    <p>Les Niveaux regroupent des classes dans lesquels les cours sont listés et organisés.</p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="course_categories carousel_slider owl-carousel owl-theme dots_white" data-margin="15" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "576":{"items": "3"}, "1000":{"items": "4"}, "1199":{"items": "5"}}'>

                    @foreach ($niveaux as $niveau)

                        <div class="item">
                            <div class="single_categories cat_style1">
                                <a href="{{ route('niveaux.show', $niveau->uuid) }}" alt="Détails" title="Details">
                                    <i class="fa fa-child text_default"></i>
                                    {{ $niveau->intitule }}
                                </a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
