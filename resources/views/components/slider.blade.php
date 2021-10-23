  <!-- START: Image Slider -->
  <div class="background-video" data-autoplay="8000">
      <style>
          .nk-background-video{
              width: 100%;
          }
      </style>
      <video class="nk-background-video" src="{{asset('public/videos/Retake-hero-desktop.mp4')}}" muted loop autoplay></video>
      <!--  @foreach($sliders as $slider)
      <div class="nk-image-slider-item">
          <img src="{{ asset('public/images/'.$slider->image) }}" alt="" class="nk-image-slider-img" data-thumb="{{ asset('public/images/'.$slider->image_thumb) }}">
          <div class="nk-image-slider-content" style="opacity: 1;">
              <h3 class="h4">{{$slider->title}}</h3>
              <p class="text-white">{{$slider->content}}</p>
              <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read More</a>
          </div>
      </div>
      @endforeach -->
  </div>
  <!-- END: Image Slider -->