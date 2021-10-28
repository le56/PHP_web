@extends('admin_layout')
    @section('dashboard')
   
          <input type="hidden" id="update_blog_page">
           <div class="container-fluid ">
           <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin-bottom: 1rem;" class="text-center text-white">Blog management</h1>
              <form id="search-form" action="" method="POST" enctype="multipart/form-data">
                  
                      <div class="form-group col-xs-9" style="padding : 0 10px">
                          <input class="form-control" type="text" name='search' placeholder="Search" />
                      </div>
                      <div class="form-group col-xs-3" style="padding-right:0;padding-left: 23px;">
                          <button type="submit" class="btn btn-block btn-primary">Search</button>
                      </div>
                
                  </div>
              </div>
              <div class="row" id="filter" style="padding: 0 25px;">

              
                      <div class="form-group col-sm-3 col-xs-6">
                          <select data-filter="make" name="category" class="filter-make filter form-control">
                              <option value="" selected disabled>Select Category</option>
                              <option value="">All categories</option>
                              @foreach($categories as $item)
                              <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                          <select data-filter="model" name="sort" class="filter-model filter form-control">
                              <option value="" selected disabled>Sort</option>
                              <option value="">All</option>
                              <option value="created_at=asc">Time create increase</option>
                              <option value="created_at=desc">Time create decrease</option>
                              <option value="title=asc">Title A->Z</option>
                              <option value="title=desc">Title Z->A</option>
                          </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                      <a class="btn btn-block btn-primary" href="{{URL::to('/admin/blog/list-blog')}}">Reset filter</a>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6" style="padding : 0 0 0 20px">
                      <button class="btn btn-block btn-success" id="btn_export-excel" type="button">Export to excel</button>
                      </div>
                  </form>
                              </div>
    
                    <table class="table table-hover" id="table-blog">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short content</th>
                          
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="listAllBlog">

                        @forelse ($blogs as $blog)
                            <tr class="row_blog_{{$blog->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td class="td_image"><img width="100" height="100" style="object-fit: cover"
                                src="{{ asset('public/images/'.$blog->image) }}" alt="">
                            </td>
                         
                            <td class="td_title">{{$blog->title}} </td>
                                <td class="td_shortContent">{{$blog->shortContent}}</td>
                                <td class="td_category">{{$blog->category}}</td>
                                <td class="table-action">
                                    <div>

                                        <a href="{{URL::to('/blog')}}/{{$blog->id}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                        <a href="" class="btn btn-sm btn-warning" data-id="{{$blog->id}}" data-toggle="modal"
                                        data-target="#update_blog"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger" data-id="{{$blog->id}}" data-toggle="modal"
                                        data-target="#delete_blog"><i class="fas fa-trash"></i></a>
                                    </div>
                            </td>
                                
                            </tr>
                        @empty
                            <td colspan="5"> List blogs is empty.</td>
                        @endforelse

                        </tbody>
                    </table>
               



            <!-- Modal delete blog -->
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
            <!-- Close Modal -->

            <!-- Modal updaete blog -->
            <div class="modal fade bd-example-modal-lg" id="update_blog" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update blog</h5>
                        </div>
                        <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" id="update_form">
                          
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
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
                                        <input type="file" name="image">
                                    </div>
                                    <div class="mt-3">
                                        <img id='blog-avt-display' src="" style="width:50%;object-fit: cover;border-radius: 10px;" alt="">
                                    </div>
                                    <br />
                            <br/>
                            <br/>
                               </form>
                      
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btn_close_update">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_confirm_update">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal -->
            <input type="hidden" value="" name="get_id_blog">
        </div>
        <!-- ranger input  -->
        <x-ck-editor />
        <script>
       
            //----------//
            var get_id_blog;
            // handle close update button
            $('#btn_close_update').click(function() {
                resetInputFile()
                $('#update_blog').modal('hide')
            })
            // handle reset input file
            function resetInputFile() { 
                $("input[name='image']").val('')
            }
            // show modal delete
            $('#delete_blog').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                get_id_blog = button.data('id')
            })
            // btn confirm delete
            $('#btn_confirm_delete').click(() => {
                $.ajax({
                    type: 'delete',
                    url: `{{ asset('/admin/blog/delete') }}/${get_id_blog}`,
                    success: function (data) {
                        $('#delete_blog').modal('hide')
                        $(`.row_blog_${data}`).remove()
                    }
                });
            })

            // show modal update
            $('#update_blog').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                get_id_blog = button.data('id')
                $.get(`{{ asset('/admin/blog/getByID') }}/${get_id_blog}`,(data) => {
                    $('#update_blog input[name="title"]').val(data.title)
                    $('#update_blog input[name="shortContent"]').val(data.shortContent)
                    editor.setData(data.content);
                    $('select[name="category"]').val(data.category)
                    $('#blog-avt-display').attr("src",`{{asset('/public/images/')}}/${data.image}`)             
                })
            })
            // confirm update blog
            $('#btn_confirm_update').click((e) => $("#update_form").submit())
            $("#update_form").submit(function (e) {
                e.preventDefault()
                $('#editor').val(editor.getData())
                $.ajax({
                    type: 'post',
                    data:new FormData(this),
                    dataType:'json',
                    contentType: false,
                    processData: false,
                    cache: false,
                    url: `{{ asset('/admin/blog/update') }}/${get_id_blog}`,
                    success: function (data) {
                        $(`.row_blog_${data.id} .td_title`).text(data.title)
                        $(`.row_blog_${data.id} .td_shortContent`).text(data.shortContent)
                        $(`.row_blog_${data.id} .td_category`).text(data.category)
                        $(`.row_blog_${data.id} .td_image img`).attr('src', `{{asset('/public/images/')}}/${data.image}`)
                        resetInputFile()
                        $('#update_blog').modal('hide')
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            })
           
           // handel image display
           $("input[name='image']").change((e) => {
                read(e.target.files[0],'blog-avt-display');
            })

             // from search blog submit
             $('#search-form').submit(function (e) {
                e.preventDefault()
                let selectSortVal = $('select[name="sort"]').val();
                var sortArr = selectSortVal ? selectSortVal.split('=') : "";
                const obj = {
                    category : $('select[name="category"]').val(),
                    sort : 
                        {
                            [sortArr[0]] : sortArr[1]
                        }
                    ,
                    search : $('input[name="search"]').val()
                }
               
                for (let [key, value] of Object.entries(obj)) {
                  if(value === null || value === "") {
                      delete obj[key];
                  }
                    }
              
                 $.ajax({
                    type: 'GET',
                    url: "{{route('blog.search')}}",
                    data: obj,
                    success: function (rs) {
                        $('#listAllBlog').html('')
                        const {data} = rs;
                        for (let [index, item] of data.entries()) {
                            $('#listAllBlog').append(`
                            <tr class="row_blog_${item.id}">
                            <td>${index + 1}</td>
                            <td class="td_image"><img width="100" height="100" style="object-fit: cover" src="{{asset('/public/images/')}}/${item.image}" alt=""></td>
                            <td class="td_title">${item.title} </td>
                            <td class="td_shortContent">${item.shortContent}</td>
                            <td class="td_category">${item.category}</td>
                            <td class="table-action">
                            <div>
                            
                            <a href="{{URL::to('/blog')}}/${item.id}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                            <a href="" class="btn btn-sm btn-warning" data-id="${item.id}" data-toggle="modal"
                            data-target="#update_blog"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger" data-id="${item.id}" data-toggle="modal"
                            data-target="#delete_blog"><i class="fas fa-trash"></i></a>
                            </div>
                            </td>
                        </tr>
                        `)
                        }
                    }
                });
            })
        // export excel
        $('#btn_export-excel').click(() => {
                exportToExel("table-blog")
            })   
        </script>
    <x-upload-image />

    @endsection
