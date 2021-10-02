@extends('admin_layout')
@section('dashboard')
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
                <div class="d-flex"><h2>List all prodcuts</h2>
                    <div class="d-flex ml-4">

                        <input class="form-control mr-sm-2" type="search" id="value_search_product" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" id="btn_search_product">Search</button>

                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Index</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Rate</th>
                        <th>Price</th>
                        <th>Content</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="listAllProduct">

                    @forelse ($products as $product)
                        <tr class="row_product_{{$product->id}}">
                            <td>{{$loop->index + 1}}</td>
                            <td class="td_title">{{$product->title}} </td>
                            <td class="td_image"><img width="100" height="100" style="object-fit: cover"
                                                      src="{{ asset('public/images/'.$product->image0) }}" alt="">
                            </td>
                            <td>{{$product->rate}}</td>
                            <td class="td_price">{{$product->price}}</td>
                            <td class="td_content">{{$product->content}}</td>
                            <td><a href="" class="btn btn-sm btn-success">Details</a></td>
                            <td><a href="" class="btn btn-sm btn-danger" data-id="{{$product->id}}" data-toggle="modal"
                                   data-target="#delete_product">Delete</a></td>
                            <td><a href="" class="btn btn-sm btn-warning" data-id="{{$product->id}}" data-toggle="modal"
                                   data-target="#update_product">Edit</a></td>
                        </tr>
                    @empty
                        <td colspan="5"> List products is empty.</td>
                    @endforelse

                    </tbody>
                </table>
            </form>

        </div>

        <!-- Modal delete product -->
        <div class="modal fade" id="delete_product" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>

                    </div>
                    <div class="modal-body">
                        Do you want to delete this product ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="btn_confirm_delete">Comfirm delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Modal -->

        <!-- Modal updaete product -->
        <div class="modal fade" id="update_product" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update product</h5>
                    </div>
                    <div class="modal-body">
                        <form id="update_product_form" method="POST">
                            <input type="hidden" name="_id_product">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter title" name="title">
                            </div>

                                <input type="hidden" name="image0">
                                <input type="hidden" name="image1">
                                <input type="hidden" name="image2">
                                <input type="hidden" name="image3">
                           
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter content" name="content">
                            </div>

                            <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="content">Rate</label>
                                <input type="number" class="form-control" aria-describedby="nameHelp" readonly
                                       name="rate">
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
                                <label for="content">Price</label>
                                <input type="number" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter number" name="price">
                            </div>

                        </form>
                        <br/>
                      <div class="row">
                          <label for="file0" class="col-sm-6 item-image pb-3">
                             <div>
                             <img src="" id="image0" alt="" class="file-img">
                              <input type="file" data-id="image0" id="file0" style="display: none">
                             </div>
                          </label>

                          <label for="file1" class="col-sm-6 item-image pb-3">
                             <div>
                             <img src="" id="image1" alt="" class="file-img">
                              <input type="file" data-id="image1" id="file1" style="display: none">
                             </div>
                          </label>

                          <label for="file2" class="col-sm-6 item-image pb-3">
                             <div>
                             <img src="" id="image2" alt="" class="file-img">
                              <input type="file" data-id="image2" id="file2" style="display: none">
                             </div>
                          </label>

                          <label for="file3" class="col-sm-6 item-image pb-3">
                             <div>
                             <img src="" id="image3" alt="" class="file-img">
                              <input type="file" data-id="image3" id="file3" style="display: none">
                             </div>
                          </label>
                          
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_confirm_update">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Close Modal -->
        <input type="hidden" value="" name="get_id_product">
    </div>

    <style>

    </style>
    </body>

    </html>
    <script>
        // check editor
        CKEDITOR.replace( 'editor');
        //----------//
        var get_id_product;
        // ajax set up
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // show modal delete
        $('#delete_product').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            get_id_product = button.data('id')
        })
        // btn confirm delete
        $('#btn_confirm_delete').click(() => {
            $.ajax({
                type: 'delete',
                url: "{{ route('product.delete') }}",
                data: {
                    id: get_id_product
                },
                success: function (data) {
                    $('#delete_product').modal('hide')
                    $(`.row_product_${data}`).remove()
                }
            });
        })

        // show modal update
        $('#update_product').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            get_id_product = button.data('id')
            $.get('{{ route("product.getByID") }}', {_id: get_id_product}, (data) => {
                $('#update_product input[name="title"]').val(data.title)
                $('#update_product input[name="content"]').val(data.content)
                $('#update_product input[name="price"]').val(data.price)
                $('#update_product input[name="rate"]').val(data.rate)
                CKEDITOR.instances.editor.setData(data.description);
                $('#editor').val(data.description)
                $('#image0').attr("src",`http://localhost/PHP_web/public/images/${data.image0}`)
                $('#image1').attr("src",`http://localhost/PHP_web/public/images/${data.image1}`)
                $('#image2').attr("src",`http://localhost/PHP_web/public/images/${data.image2}`)
                $('#image3').attr("src",`http://localhost/PHP_web/public/images/${data.image3}`)
                $("input[name='image0'").val(data.image0)
                $("input[name='image1'").val(data.image1)
                $("input[name='image2'").val(data.image2)
                $("input[name='image3'").val(data.image3)
                $('select[name="category"]').val(data.category)
                $('input[name="_id_product"]').val(data.id)             
            })
        })
        // confirm update product
        $('#btn_confirm_update').click((e) => {
           $('#editor').val(CKEDITOR.instances.editor.getData())
            $.ajax({
                type: 'put',
                dataType: "json",
                url: "{{ route('product.update') }}",
                data: $('#update_product_form').serialize(),
                success: function (data) {
                    $(`.row_product_${data.id} .td_title`).text(data.title)
                    $(`.row_product_${data.id} .td_content`).text(data.content)
                    $(`.row_product_${data.id} .td_price`).text(data.price)
                    $(`.row_product_${data.id} .td_image img`).attr('src', `http://localhost/PHP_web/public/images/${data.image0}`)
                    $('#update_product').modal('hide')
                },
                error: function (err) {
                    alert('Input is not empty !')
                }
            });
        })
        // from search product submit
        $('#btn_search_product').click((e) => {
            e.preventDefault()
            let searchVal = $('#value_search_product').val()
            if (searchVal === '') {
                alert('Please enter value to search !')
                return
            }
            $.ajax({
                type: 'GET',
                url: "{{route('product.search')}}",
                data: {search: searchVal},
                success: function (data) {
                    $('#listAllProduct').html('')
                    for (let [index, item] of data.entries()) {
                        $('#listAllProduct').append(`
                           <tr class="row_product_${item.id}">
                        <td>${index + 1}</td>
                        <td class="td_title">${item.title} </td>
                        <td class="td_image"><img width="100" height="100" style="object-fit: cover" src="http://localhost/PHP_web/public/images/${item.image0}" alt=""></td>
                        <td>${item.rate}</td>
                        <td class="td_price">${item.price}</td>
                        <td class="td_content">${item.content}</td>
                        <td><a href="" class="btn btn-sm btn-success">Details</a></td>
                        <td><a href=""  class="btn btn-sm btn-danger" data-id="${item.id}"  data-toggle="modal" data-target="#delete_product">Delete</a></td>
                        <td><a href="" class="btn btn-sm btn-warning" data-id="${item.id}" data-toggle="modal" data-target="#update_product">Edit</a></td>
                    </tr>
                       `)
                    }
                }
            });
        })

        $("input[type='file']").change( function (e) {
            const file = e.target.files[0]
            const data_id = $(this).attr("data-id")
             upload(file,data_id)
        })

        // function upload file 
        function upload(file,data_id) {
            const data = new FormData();
            data.append('file', file);
            data.append("filenamedel",$(`input[name="${data_id}"]`).val())
            data.append('idProduct',  $('input[name="_id_product"]').val());
            data.append('imagestt', data_id);
            data.append("getOriginalName",Date.now() + file.name)
            $.ajax({
            url:"{{ route('update_imageProduct') }}",
            method:'POST',
            data:data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                read(file,data_id)
                $(`input[name="${data_id}"]`).val(data)
            }
            });
        }
        // function read image 
        function read(file,imageInput) {
            let imageType = /image.*/
            if(file.type.match(imageType)) {
                let reader = new FileReader();
                reader.onload =  (e) => {
                    let image = new Image();
                    image.src =  e.target.result
                    $(`#${imageInput}`).attr('src',image.src)
                }
            reader.readAsDataURL(file)
            }
            else return alert('File is not support !')
        }
 
    </script>

@endsection
