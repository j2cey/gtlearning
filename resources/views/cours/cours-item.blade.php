<div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
    <div class="course_img radius_ltrt_10">
        <a href="{{ route('cours.lecture', $cour->id) }}"><img src="{{ $cour->imagecours->fullpath }}" alt="course_img1"/></a>
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
            <small>Auteur: </small> <a href="{{ route('auteurs.show', $cour->auteur->uuid) }}"><span class="badge badge-secondary">{{ $cour->auteur->personne->nomComplet }}</span></a>
        </div>
        <div class="price">
            @can('cours-update')
            <a href="{{ route('cours.edit', $cour->uuid) }}"><i class="ti-pencil-alt" style="color:green"></i></a>
            @endcan
        </div>
    </div>
</div>
