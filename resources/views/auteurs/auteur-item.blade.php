<div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
    <div class="team_img">
        <img src="{{ $auteur->imageauteurPath }}" alt="team1">
        <ul class="list_none social_icons social_white">
            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
            @can('auteur-update')
            <li><a href="{{ route('auteurs.edit', $auteur->uuid) }}"><i class="ti-pencil-alt"></i></a></li>
            @endcan
        </ul>
    </div>
    <div class="team_title radius_lbrb_10 text-center">
        <div class="team_name">
            <h5><a href="#">{{ $auteur->nomComplet }}</a></h5>
            <span>{{ $auteur->fonction }}</span>
        </div>
        <div class="courses_info">
            <div class="rating_stars">
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star"></i>
                <i class="ion-android-star-half"></i>
            </div>
            <ul class="list_none content_meta">
                <li><a href="{{ route('cours.byauteur', $auteur->id) }}"><i class="ti-ruler-pencil"></i>{{ $auteur->cours->count() }}</a></li>
                <li><a href="#" ><i class="ti-user"></i>31</a></li>
            </ul>
        </div>
        <h6>
            @can('auteur-update')
                <a href="{{ route('auteurs.edit', $auteur->uuid) }}"><i class="ti-pencil-alt" style="color:green"></i></a>
            @endcan
        </h6>
    </div>
</div>
