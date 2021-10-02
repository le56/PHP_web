@extends('admin_layout')
@section('screen')
<style>
   img {
       width: 100%;
       border-radius: 5pxlabel  }
   .nk-gallery-item-box {
       margin-bottom: 1rem;
   }
   .nk-gallery-item-label {
       position: absolute;
       bottom: 40px;
       left: 35px;
       color: #fff
   }
   h1 {
       margin-bottom: 1rem;
       margin-left: 1rem;
   }
</style>
<h1 >Store gallery</h1>
      <!-- START: Some Products -->
     
      <div class="nk-gap-2"></div>
        <div class="row vertical-gap">
        @foreach ($galleries as $gallery)
            <div class="col-md-6 col-lg-4">
                <label for="file1" class="nk-gallery-item-box">
                <input type="file" data-read="read1" data-name="{{$gallery->image}}" data-id="{{$gallery->id}}" id="file1" style="display: none" accept=".jpeg,.jpg,.png">
                    <a  class="nk-gallery-item">
                        <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                        <img id="read1" src="{{ asset ('public/images/')}}/{{$gallery->image}}" alt="She was bouncing">
                    </a>
                    <div class="nk-gallery-item-label">
                        <input type="text" value="{{$gallery->title}}" data-id="{{$gallery->id}}"  class="form-control">
                    </div>
                </label>
            </div>
            @break
            @endforeach
            
           
            <div class="col-md-12 col-lg-4">
                <div class="row vertical-gap">
                   
                @foreach ($galleries as $gallery)
                @if($loop->index > 0 && $loop->index < 5)
               <div class="col-md-6">
                        <label for="file{{$loop->index + 1}}" class="nk-gallery-item-box">
                        <input type="file" data-read="read{{$loop->index + 1}}" data-name="{{$gallery->image}}" data-id="{{$gallery->id}}" id="file{{$loop->index + 1}}" style="display: none" accept=".jpeg,.jpg,.png">
                            <a  class="nk-gallery-item">
                                <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                                <img id="read{{$loop->index + 1}}" src="{{ asset ('public/images/')}}/{{$gallery->image}}" alt="It was some time before">
                            </a>
                        </label>
                    </div>
                @endif
            @endforeach
                </div>
            </div>
            @foreach ($galleries as $gallery)
            @if($loop->index === 5)
            <div class="col-md-6 col-lg-4 order-lg-3">
                <label for="file6" class="nk-gallery-item-box">
                <input type="file" data-read="read6" data-name="{{$gallery->image}}" data-id="{{$gallery->id}}" id="file6" style="display: none" accept=".jpeg,.jpg,.png">
                    <a  class="nk-gallery-item">
                        <span class="nk-gallery-item-overlay"><span><span class="nk-icon-circles"></span></span></span>
                        <img id="read6" src="{{ asset ('public/images/')}}/{{$gallery->image}}" alt="However, I have reason">
                    </a>
                    <div class="nk-gallery-item-label">
                        <input type="text" value="{{$gallery->title}}" data-id="{{$gallery->id}}" class="form-control">
                    </div>
                </label>
            </div>
            @endif
            @endforeach
        </div>
        <!-- END: Some Products -->
   <script>
         // ajax set up
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("input[type='file']").change( function (e) {
            const file = e.target.files[0]
            const self = $(this)
             upload(file,self)
        })

        $("input[type='text']").keypress(function (e) {
         if(e.which === 13 ) {
            $.ajax({
           type: "PUT",
           url: "{{route('updateStoreGallery')}}",
           data: {id : $(this).attr("data-id"),title : e.target.value},
           success: function(data)
           {
              $(this).val(data)
              alert('Title updated !')
           }
         });
         }
      }) 

        // function upload file 
        function upload(file,self) {
            const data = new FormData();
            data.append('file', file);
            data.append("filenamedel",self.attr("data-name"))
            data.append('idStoreGallery',self.attr("data-id"));
            data.append('imagestt', "image");
            data.append('type',"storeGallery")
            data.append("getOriginalName",Date.now() + file.name)
            $.ajax({
            url:"{{ route('update_image') }}",
            method:'POST',
            data:data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                read(file,self.attr("data-read"))
                self.attr("data-name",data)
            }
            });
        }
        // function read image 
        function read(file,imageInput) {
            let imageType = /image.*/
            if(file.type.match(imageType)) {
                let reader = new FileReader();
                reader.onload =  (e) => {
                    let image = new Image();
                    image.src =  e.target.result
                    $(`#${imageInput}`).attr('src',image.src)
                }
            reader.readAsDataURL(file)
            }
            else return alert('File is not support !')
        }
 
   </script>

@endsection
