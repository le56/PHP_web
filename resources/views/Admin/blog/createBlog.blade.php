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
    
    <script>
      // check  editor
      CKEDITOR.replace( 'editor',{
        filebrowserUploadUrl: "{{route('upload_checkEditor', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
      });
      
    </script>
   
@endsection
