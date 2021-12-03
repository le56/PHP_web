@extends('welcome')
@section('detailBlog')
<div class="container" style="padding : 1rem">
    <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;" class="text-center text-white">Create blog</h1>
        <form action="{{URL::to('/blog/create')}}" id="form" method="POST" enctype="multipart/form-data">
           @csrf
            {{csrf_field()}}
            <div class="form-group">
                @error('title')
                <p class="text-danger" style="margin-bottom: .25rem;">{{ $message }}</p>
                @enderror
                <label for="title">Title</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter title" name="title">
            </div>
           

            @error('shortContent')
            <p class="text-danger" style="margin-bottom: .25rem;">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="shortContent">Short content</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter short content" name="shortContent">
            </div>
            @error('content')
            <p class="text-danger" style="margin-bottom: .25rem;">{{ $message }}</p>
            @enderror
            <div class="form-group">
            <label >Content</label>
            <textarea name="content" id="editor"></textarea>
            </div>
            @error('category')
            <p class="text-danger" style="margin-bottom: .25rem;">{{ $message }}</p>
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
            <p class="text-danger" style="margin-bottom: .25rem;">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label>Post avatart</label>
            </div>
           <div style="display:flex;justify-content: center;">
           <input type="file" style="display:none" name="image" id="image">
            <label for="image" class="mt-3" style="max-width: 500px;cursor: pointer;">
                <img id='blog-avt-display' src="http://trym.mobie.in/data-images/share-code-auto-upload-tammanger-2-0-1.jpg" style="width:100%;object-fit: cover;border-radius: 10px;" alt="">
            </label>
           </div>
            <br />
    <br/>
    <div ><button class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1" type="submit">Create post</button></div>
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