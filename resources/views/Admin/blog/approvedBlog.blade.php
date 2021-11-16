@extends('admin_layout')
    @section('dashboard')
   
          <input type="hidden" id="update_blog_page">
           <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin-bottom: 1rem;" class="text-center text-white">Approved blog management</h1>
             <table class="table table-hover" id="table-blog">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short content</th>
                            <th>Category</th>
                            <th>Display</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="listAllBlog">

                        @forelse ($blogs as $blog)
                            <tr class="row_blog_{{$blog->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td class="td_image"><img width="60" height="60" style="object-fit: cover"
                                src="{{ asset('public/images/'.$blog->image) }}" alt="">
                            </td>
                         
                            <td class="td_title">{{$blog->title}} </td>
                                <td class="td_shortContent">{{$blog->shortContent}}</td>
                                <td class="td_category">{{$blog->category}}</td>
                                <td class="td_display"><?php if($blog->display) echo "True"; else echo "False"; ?></td>
                                <td class="table-action">
                                    <div>
                                        <a href="{{URL::to('/blog')}}/{{$blog->id}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                        <button data-id="{{$blog->id}}" id="btn_display_blog" href="" class="btn btn-sm btn-warning" data-id="{{$blog->id}}" ><i class="fas fa-check-circle"></i></i></button>
                                        <button data-id="{{$blog->id}}" id="btn_hidden_blog" href="" class="btn btn-sm btn-danger" data-id="{{$blog->id}}"><i class="fas fa-times-circle"></i></button>
                                    </div>
                            </td>
                                
                            </tr>
                        @empty
                            <td colspan="7"> List blogs is empty.</td>
                        @endforelse

                        </tbody>
                    </table>
               
        <script>
            $('#btn_display_blog').click({status : 1},approved)
            $('#btn_hidden_blog').click({status : 0},approved)
            function approved(e) {
               let id = $(this).attr('data-id');
               $.ajax({
                type: "PATCH",
                url: `{{URL::to('/admin/blog/approved/${id}')}}`,
                data: {status : e.data.status},
                success: function(data)
                {
                    $(`.row_blog_${data}`).remove();
                }
                });
           }
        </script>

    @endsection
