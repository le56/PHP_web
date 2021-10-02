@extends('admin_layout')
@section('slider')
   <style>
       img {
           width: 100%;
       }
   </style>

                  <div class="container">
                  <form action="{{URL::to('/admin/home-slider')}}/{{$item->id}}" method="post">
                  @csrf
                  @method('PUT')
                
                            <input type="hidden" name="idSlider" value="{{$item->id}}">
                            <input type="hidden" name="image" value="{{$item->image}}">
                            <input type="hidden" name="image_thumb" value="{{$item->image_thumb}}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter title" value="{{$item->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" rows="3" value="{{$item->content}}">{{$item->content}}</textarea>
                            </div>
                            
                            <div class="row">
                          <label for="file0" class="col-sm-6 item-image pb-3">
                              <p>Image</p>
                             <div>
                             <img src="{{ asset('public/images/'.$item->image) }}" id="image" alt="" class="file-img">
                              <input type="file" data-id="image" id="file0" style="display: none" accept=".jpeg,.jpg,.png">
                             </div>
                          </label>

                          <label for="file1" class="col-sm-6 item-image pb-3">
                              <p>Imgae thumb</p>
                             <div>
                             <img src="{{ asset('public/images/'.$item->image_thumb) }}" id="image_thumb" alt="" class="file-img">
                              <input type="file" data-id="image_thumb" id="file1" style="display: none" accept=".jpeg,.jpg,.png">
                             </div>
                          </label>
                            </div>
                         <br/>
                         <div>
                             <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                        </form>
                  </div>

      <script>
        // ajax set up
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("input[type='file']").change( function (e) {
            const file = e.target.files[0]
            const data_id = $(this).attr("data-id")
             upload(file,data_id)
        })

        // function upload file 
        function upload(file,data_id) {
            const data = new FormData();
            data.append('file', file);
            data.append("filenamedel",$(`input[name="${data_id}"]`).val())
            data.append('idSlider',  $('input[name="idSlider"]').val());
            data.append('imagestt', data_id);
            data.append('type',"slider_home")
            data.append("getOriginalName",Date.now() + file.name)
            $.ajax({
            url:"{{ route('update_image') }}",
            method:'POST',
            data:data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                read(file,data_id)
                $(`input[name="${data_id}"]`).val(data)
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
