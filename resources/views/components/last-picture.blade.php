<div class="nk-gap"></div>
<h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1">Latest</span> Pictures</span></h2>
<div class="nk-gap"></div>
<div class="nk-popup-gallery" data-pswp-uid="1">
    <div class="row vertical-gap">
        @foreach($listScreenshots as $picture)
        <div class="col-lg-4 col-md-6">
            <div class="nk-gallery-item-box">
                <a href="{{ asset('public/images/'.$picture->image) }}" class="nk-gallery-item" data-size="1016x572">
                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                    <img src="{{ asset('public/images/'.$picture->image_thumb) }}" alt="">
                </a>
                <div class="nk-gallery-item-description">
                    <h4>Called Let</h4>
                    Divided thing, land it evening earth winged whose great after. Were grass night. To Air itself saw bring fly fowl. Fly years behold spirit day greater of wherein winged and form. Seed open don't thing midst created dry every greater divided of, be man is. Second Bring stars fourth gathering he hath face morning fill. Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>