@extends('admin_layout')
@section('screen')
<style>
    .file-img {
        width: 100%;
        height:200px;
        object-fit:cover
    }
    .item-image {
        padding : 8px !important;
        
    }
    .item-image img {
        border-radius : 10px
    }
</style>
    <div class="col-sm-12">
        <div class="container-fluid ">
            <form action="" method="post" id="formControl">
                <div class="d-flex"><h2>Screen shot management</h2>
                
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Index</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Content</th>
                       
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td >{{$slider->title}} </td>
                            <td><img width="100" height="100" style="object-fit: cover"
                                                      src="{{ asset('public/images/'.$slider->image) }}" alt="">
                            </td>
                            <td >{{$slider->content}}</td>
                            <td><a href="home-slider/{{$slider->id}}" class="btn btn-sm btn-warning">Edit</a></td>
                        </tr>
                    @empty
                        <td colspan="5"> List sliders is empty.</td>
                    @endforelse

                    </tbody>
                </table>
            </form>

        </div>

    </div>

    <style>

    </style>
    </body>

    </html>
   

@endsection
