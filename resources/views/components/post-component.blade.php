<div class="col-md-6">
    <div class="nk-widget">
        <h4 class="nk-widget-title"><span class="text-main-1">Latest</span> Posts</h4>
        <div class="nk-widget-content">
            <div class="row vertical-gap sm-gap">
            @foreach($lastpost as $post)
                <div class="col-lg-6">
                    <div class="nk-widget-post-2">
                        <a href="{{URL::to('/blog')}}/{{$post->id}}" class="nk-post-image">
                            <img src="{{ asset('public/images/'.$post->image) }}" alt="">
                        </a>
                        <div class="nk-post-title" style="font-weight: 500;"><a href="{{URL::to('/blog')}}/{{$post->id}}">{{$post->title}}</a></div>
                        <div class="nk-post-date">
                            <span class="fa fa-calendar"></span>  {{date('d-m-Y', strtotime($post->created_at))}}
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>