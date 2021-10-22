@extends('admin_layout')
@section('screen')
   <style>
       img {
           width: 100%;
       }
   </style>

                  <div class="container">
                  <form action="{{URL::to('/admin/screen')}}/{{$item->id}}" method="post">
                  @csrf
                  @method('PUT')
                
                            <input type="hidden" name="idScreen" value="{{$item->id}}">
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
      

        $("input[type='file']").change( function (e) {
            const file = e.target.files[0]
            const data_id = $(this).attr("data-id")
             upload(file,data_id,"idScreen","screen")
        })
          
     
        
        </script>
        <x-upload-image></x-upload-image>
    @endsection
