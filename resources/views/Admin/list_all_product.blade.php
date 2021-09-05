@extends('admin_layout')
@section('dashboard')
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
                                                      src="{{ asset('public/assets/images/'.$product->image) }}" alt="">
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

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" aria-describedby="nameHelp" name="imageFile">
                                <input type="hidden" name="image">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter content" name="content">
                            </div>

                            <div class="form-group">
                                <label for="content">Rate</label>
                                <input type="number" class="form-control" aria-describedby="nameHelp" readonly
                                       name="rate">
                            </div>

                            <div class="form-group">
                                <label for="content">Price</label>
                                <input type="number" class="form-control" aria-describedby="nameHelp"
                                       placeholder="Enter number" name="price">
                            </div>

                        </form>
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
            $.get('{{ route('product.getByID') }}', {_id: get_id_product}, (data) => {
                $('#update_product input[name="title"]').val(data.title)
                $('#update_product input[name="content"]').val(data.content)
                $('#update_product input[name="price"]').val(data.price)
                $('#update_product input[name="rate"]').val(data.rate)
                $('input[name="image"]').val(data.image)
                $('input[name="_id_product"]').val(data.id)
            })
        })
        $('input[name="imageFile"]').change(function () {
            $('input[name="image"]').val(this.files[0].name)
        })
        // confirm update product
        $('#btn_confirm_update').click(() => {
            $.ajax({
                type: 'put',
                dataType: "json",
                url: "{{ route('product.update') }}",
                data: $('#update_product_form').serialize(),
                success: function (data) {
                    $(`.row_product_${data.id} .td_title`).text(data.title)
                    $(`.row_product_${data.id} .td_content`).text(data.content)
                    $(`.row_product_${data.id} .td_price`).text(data.price)
                    $(`.row_product_${data.id} .td_image img`).attr('src', `http://localhost/PHP_web/public/assets/images/${data.image}`)
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
                        <td class="td_image"><img width="100" height="100" style="object-fit: cover" src="http://localhost/PHP_web/public/assets/images/${item.image}" alt=""></td>
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
    </script>

@endsection
