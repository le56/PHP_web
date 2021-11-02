@extends('welcome')
@section('detailBlog')

<style>
    .action-post {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }
    .nk-blog-post {
        position: relative;
    }
    .nk-blog-post a {
        border-radius: 10px;
    }
    .status-post {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10;
    }
    .label {
    display: inline;
    padding: .5rem 1rem;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.5em;
;
}
.label-danger {
    background-color: #d9534f;
}
.label-success {
    background-color: #5cb85c;
}
.label-warning {
    background-color: #f0ad4e;
}
</style>

<div class="container" style="margin-top:2rem">
    <div class="row vertical-gap">
      

            <!-- START: Posts Grid -->
            <div class="nk-blog-grid w-100">
              <div class="d-flex justify-content-between w-100">
              <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin:2rem 0" class="text-white">Management blog</h1>
                <div class="d-flex align-items-center  ">
                <a href="{{URL::to('/blog/create')}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Create new blog</a>
                </div>
              </div>
                <div class="row" >
                    @forelse ($blogs as $blog)
                    <div class="col-md-4">
                        <!-- START: Post -->
                        <div class="nk-blog-post">
                        <div class="status-post">
                           <?php
                           if($blog->approved) {
                            if($blog->display) {
                                echo '<span class="label label-success">Success</span>';
                            }
                            else echo '<span class="label label-danger">Denied</span>';
                        }
                        else echo '<span class="label label-warning">Approving</span>';
                           ?>

                        </div>
                            <div class="action-post">
                                    <a href="" class="btn btn-sm btn-warning mr-5" data-id="{{$blog->id}}" data-toggle="modal"
                                    data-target="#update_blog"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-id="{{$blog->id}}" data-toggle="modal"
                                    data-target="#delete_blog"><i class="fas fa-trash"></i></a>
                            </div>
                            <a href="#" class="nk-post-img">
                                <img src="{{asset('/public/images')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                <span class="nk-post-comments-count">0</span>
                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="#">{{$blog->title}}</a></h2>
                            <div class="nk-post-by">
                                <img src="{{$blog->User->avatar}}" alt="Hitman" class="rounded-circle" width="30"> by <a href="#">{{$blog->User->name}}</a> {{$blog->created_at}}
                            </div>
                            <div class="nk-gap"></div>
                            <div class="nk-post-text">
                                <p>{{$blog->shortContent}}</p>
                            </div>
                            <div class="nk-gap"></div>
                        </div>
                        <!-- END: Post -->
                    </div>
                    @empty
                    <h2>You do not have blog !</h2>
                @endforelse
                </div>

                <!-- START: Pagination -->
                <!-- END: Pagination -->
           
            <!-- END: Posts Grid -->

        </div>
      
    </div>
</div>
 <!-- Modal delete blog -->
  <!-- Modal updaete blog -->
  <div class="modal fade bd-example-modal-lg" id="update_blog" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update blog</h5>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data" id="update_form">
                        {{ method_field('PUT') }}
                        @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" aria-describedby="nameHelp"
                                        placeholder="Enter title" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="shortContent">Short content</label>
                                    <input type="text" class="form-control" aria-describedby="nameHelp"
                                        placeholder="Enter shortContent" name="shortContent">
                                </div>

                                <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="editor"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Category</label>
                                    <select class="form-control" name="category" aria-label="form-select-lg example">
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                        <label for="image">Post avatar</label>
                                    
                                    </div>
                                    <div style="display:flex;justify-content: center;">
                                    <input type="file" style="display:none" name="image" id="image">
                                        <label for="image" class="mt-3" style="max-width: 500px;cursor: pointer;">
                                            <img id='blog-avt-display' src="http://trym.mobie.in/data-images/share-code-auto-upload-tammanger-2-0-1.jpg" style="width:100%;object-fit: cover;border-radius: 10px;" alt="">
                                        </label>
                                    </div>
                                    <br />
                            <br/>
                            <br/>
                               </form>
                      
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_close_update">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_confirm_update">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal -->
           <div class="modal fade" id="delete_blog" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete blog</h5>

                        </div>
                        <div class="modal-body">
                            Do you want to delete this blog ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="btn_confirm_delete">Comfirm delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" name="get_id_blog">
            <!-- Close Modal -->
            <x-ck-editor />
            <script>
                var get_id_blog;
                // show modal delete
                $('#delete_blog').on('show.bs.modal', function (event) {
                        let button = $(event.relatedTarget)
                        get_id_blog = button.data('id')
                    })
                  // btn confirm delete
                    $('#btn_confirm_delete').click(() => {
                        $.ajax({
                            type: 'delete',
                            url: `{{ URL::to('/blog/delete') }}/${get_id_blog}`,
                            success: function () {
                                location.href = location.href
                            },
                            error: function (jqXHR, textStatus, errorTh) {
                                console.log(errorTh)
                            }
                        });
                        
                    })

                    // show modal update
                $('#update_blog').on('show.bs.modal', function (event) {
                    let button = $(event.relatedTarget)
                    get_id_blog = button.data('id')
                    $.get(`{{ URL::to('/blog/getByID') }}/${get_id_blog}`,(data) => {
                        $('#update_blog input[name="title"]').val(data.title)
                        $('#update_blog input[name="shortContent"]').val(data.shortContent)
                        editor.setData(data.content);
                        $('select[name="category"]').val(data.category)
                        $('#blog-avt-display').attr("src",`{{asset('/public/images/')}}/${data.image}`)             
                    })
                })
                 // confirm update blog
            $('#btn_confirm_update').click((e) => {
                $("#update_form").attr("action",`{{URL::to('/blog/update')}}/${get_id_blog}`)
                $("#update_form").submit()
            })   
            // 
            $("input[name='image']").change((e) => {
            read(e.target.files[0],'blog-avt-display');
        })     
            </script>
            <x-upload-image />
@endsection