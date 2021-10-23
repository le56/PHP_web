@extends('admin_layout')
@section('dashboard')
    <div class="container">

        <form action="{{URL::to('/admin/product/create')}}" id="form" method="POST" enctype="multipart/form-data">
           @csrf
            {{csrf_field()}}
            <div class="form-group">
                @error('title')
                <p class="text-danger mt-3">{{ $message }}</p>
                @enderror
                <label for="title">Title</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter title" name="title">
            </div>
            <!-- @error('image')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror -->
           
                <input  type="hidden" class="form-control"  aria-describedby="nameHelp" name="image0">
                <input  type="hidden" class="form-control"  aria-describedby="nameHelp" name="image1">
                <input  type="hidden" class="form-control"  aria-describedby="nameHelp" name="image2">
                <input  type="hidden" class="form-control"  aria-describedby="nameHelp" name="image3">


            @error('content')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Content</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter content" name="content">
            </div>
            @error('description')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
            <label >Description</label>
            <textarea name="description" id="editor"></textarea>
            </div>
            @error('rate')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Rate</label>
                <select class="form-control" name="rate" aria-label="form-select-lg example">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            @error('category')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Category</label>
                <select class="form-control" name="category" aria-label="form-select-lg example">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                    @endforeach

                </select>
            </div>
            @error('price')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Price</label>
                <input  type="number" class="form-control"  aria-describedby="nameHelp" placeholder="Enter number" name="price">
            </div>
           
        </form>
        <br />
        <form method="post" action="{{URL::to('/upload')}}" enctype="multipart/form-data" class="dropzone" id="my-great-dropzone">
        @csrf
    </form>
    <br/>
    <div ><button class="btn btn-primary" id="formSubmit">Create</button></div>
    </div>
    <x-ck-editor />
    <script>  


      //----------//
        const arrImage = [];
        $('#formSubmit').click(function (e) {
           if(arrImage.length < 4) {
               e.preventDefault();
             return  alert('Please choose at least 4 images');
           }
           for(let i=0;i<=arrImage.length;i++) {
            $(`input[name="image${i}"]`).val(arrImage[i])
           }
            $("#form").submit()
          
        })
         // ajax set up
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Dropzone.options.myGreatDropzone = { 
            paramName : "file",
            maxFilesize: 4,
            maxFiles: 4,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks : true,
            timeout : 50000,
            addedfile(file) {
                arrImage.push(file.upload.filename)
                if (this.element === this.previewsContainer) {
      this.element.classList.add("dz-started");
    }

    if (this.previewsContainer && !this.options.disablePreviews) {
      file.previewElement = Dropzone.createElement(
        this.options.previewTemplate.trim()
      );
      file.previewTemplate = file.previewElement; // Backwards compatibility

      this.previewsContainer.appendChild(file.previewElement);
      for (var node of file.previewElement.querySelectorAll("[data-dz-name]")) {
        node.textContent = file.name;
      }
      for (node of file.previewElement.querySelectorAll("[data-dz-size]")) {
        node.innerHTML = this.filesize(file.size);
      }

      if (this.options.addRemoveLinks) {
        file._removeLink = Dropzone.createElement(
          `<a class="dz-remove" href="javascript:undefined;" data-dz-remove>${this.options.dictRemoveFile}</a>`
        );
        file.previewElement.appendChild(file._removeLink);
      }

      let removeFileEvent = (e) => {
        e.preventDefault();
        e.stopPropagation();
        if (file.status === Dropzone.UPLOADING) {
          return Dropzone.confirm(
            this.options.dictCancelUploadConfirmation,
            () => this.removeFile(file)
          );
        } else {
          if (this.options.dictRemoveFileConfirmation) {
            return Dropzone.confirm(
              this.options.dictRemoveFileConfirmation,
              () => this.removeFile(file)
            );
          } else {
            return this.removeFile(file);
          }
        }
      };

      for (let removeLink of file.previewElement.querySelectorAll(
        "[data-dz-remove]"
      )) {
        removeLink.addEventListener("click", removeFileEvent);
      }
    }
            },
            removedfile: function(file) {
             var name = file.upload.filename;
             $.ajax({
                type: "POST",
                url: "{{ route('deleteUpload') }}",
                data: {filename : name}, 
                success: function(data)
                {
                  
                        for( var i = 0; i < arrImage.length; i++){ 
                        
                        if ( arrImage[i] === data) { 

                            arrImage.splice(i, 1); 
                        }

                    }
                }
                });
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            renameFile : function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },

        }
    </script>
@endsection
