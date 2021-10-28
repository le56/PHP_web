@extends('admin_layout')
@section('dashboard')
    <div class="container">
    <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;" class="text-center text-white">Create blog</h1>
        <form action="{{URL::to('/admin/blog/create')}}" id="form" method="POST" enctype="multipart/form-data">
           @csrf
            {{csrf_field()}}
            <div class="form-group">
                @error('title')
                <p class="text-danger mt-3">{{ $message }}</p>
                @enderror
                <label for="title">Title</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter title" name="title">
            </div>
           

            @error('short-content')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="shortContent">Short content</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter short content" name="shortContent">
            </div>
            @error('content')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
            <label >Content</label>
            <textarea name="content" id="editor"></textarea>
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
            @error('image')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="image">Post avatart</label>
                 <input type="file" name="image">
            </div>
            <div class="mt-3">
                <img id='blog-avt-display' src="https://www.azjollyjumpers.com/cp/resources/images//items/no_picture.png" style="width:50%;object-fit: cover;border-radius: 10px;" alt="">
            </div>
            <br />
    <br/>
    <div ><button class="btn btn-primary" type="submit">Create post</button></div>
        </form>
      
    </div>
    
    <x-ck-editor />
    <script>
       $("input[name='image']").change((e) => {
        read(e.target.files[0],'blog-avt-display');
       })
    </script>
    <x-upload-image />
   
@endsection
