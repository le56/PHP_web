@extends('admin_layout')
@section('dashboard')
    <div class="container">

        <form action="{{URL::to('/admin/product/create')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                @error('title')
                <p class="text-danger mt-3">{{ $message }}</p>
                @enderror
                <label for="title">Title</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter title" name="title">
            </div>
            @error('image')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="image">Image</label>
                <input  type="file" class="form-control"  aria-describedby="nameHelp" name="image">
            </div>
            @error('content')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Content</label>
                <input  type="text" class="form-control"  aria-describedby="nameHelp" placeholder="Enter content" name="content">
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
            @error('price')
            <p class="text-danger mt-3">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="content">Price</label>
                <input  type="number" class="form-control"  aria-describedby="nameHelp" placeholder="Enter number" name="price">
            </div>
            <div ><button class="btn btn-primary" type="submit" href="">Create</button></div>
        </form>
    </div>
@endsection
