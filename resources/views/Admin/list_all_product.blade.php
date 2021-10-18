    @extends('admin_layout')
    @section('dashboard')
    
        <div class="col-sm-12">
            <div class="container-fluid ">
              
    <form id="search-form" action="" method="POST" enctype="multipart/form-data">
       
        
			<div class="form-group col-xs-9">
				<input class="form-control" type="text" name='search' placeholder="Search" />
			</div>
			<div class="form-group col-xs-3" style="padding-right:0;padding-left: 23px;">
				<button type="submit" class="btn btn-block btn-primary">Search</button>
			</div>
      
		</div>
	</div>
	<div class="row" id="filter" style="padding: 0 30px;">
		<form>
        <div class="range-slider col-sm-3 col-xs-6">
            <div>
             <span class="rangeValues"></span>
         <input value="0"  name="pgt" min="0" max="1800" step="1" type="range">
            <input value="1800" min="0" name="plt" max="1800" step="1" type="range">
         </div>
         </div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="make" name="category" class="filter-make filter form-control">
					<option value="" selected disabled>Select Category</option>
                    <option value="">All</option>
					@foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                    @endforeach
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="model" name="sort" class="filter-model filter form-control">
					<option value="" selected disabled>Sort</option>
                    <option value="">All</option>
					<option value="price=asc">Price increase</option>
                    <option value="price=desc">Price decrease</option>
                    <option value="title=asc">Title A->Z</option>
                    <option value="title=desc">Title A->Z</option>
                    <option value="rate=asc">Rate increase</option>
                    <option value="rate=desc">Rate decrease</option>
                    <option value="selled=asc">Selled increase</option>
                    <option value="selled=desc">Selled decrease</option>
				</select>
			</div>
			<!-- <div class="form-group col-sm-3 col-xs-6">
				<select data-filter="type" class="filter-type filter form-control">
					<option value="">Select Type</option>
				</select>
			</div> -->
			<div class="form-group col-sm-3 col-xs-6">
            <button class="btn btn-block btn-success" id="btn_export-excel" type="button">Export to excel</button>
			</div>
		</form>
                    </div>
                    <table class="table table-hover" id="table-product">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Rate</th>
                            <th>Price</th>
                            <th>Selled</th>
                            <th>Content</th>
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
                                <td class="td_selled">{{$product->selled}}</td>
                                <td class="td_content">{{$product->content}}</td>
                                <td class="table-action">
                                    <a href="{{URL::to('/product')}}/{{$product->id}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                    <a href="" class="btn btn-sm btn-warning" data-id="{{$product->id}}" data-toggle="modal"
                                    data-target="#update_product"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-id="{{$product->id}}" data-toggle="modal"
                                    data-target="#delete_product"><i class="fas fa-trash"></i></a>
                            </td>
                                
                            </tr>
                        @empty
                            <td colspan="5"> List products is empty.</td>
                        @endforelse

                        </tbody>
                    </table>
               

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
            <div class="modal fade bd-example-modal-lg" id="update_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
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
                                    <label for="selled">Selled</label>
                                    <input type="number" class="form-control" aria-describedby="nameHelp" readonly
                                        name="selled">
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
        <!-- ranger input  -->
        
        <script>
            // check editor
            CKEDITOR.replace( 'editor');
            //----------//
            var get_id_product;
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
                    $('#update_product input[name="selled"]').val(data.selled)
                    CKEDITOR.instances.editor.setData(data.description);
                    $('#editor').val(data.description)
                    $('#image0').attr("src",`{{asset('/public/images/')}}/${data.image0}`)
                    $('#image1').attr("src",`{{asset('/public/images/')}}/${data.image1}`)
                    $('#image2').attr("src",`{{asset('/public/images/')}}/${data.image2}`)
                    $('#image3').attr("src",`{{asset('/public/images/')}}/${data.image3}`)
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
                        $(`.row_product_${data.id} .td_image img`).attr('src', `{{asset('/public/images/')}}/${data.image0}`)
                        $('#update_product').modal('hide')
                    },
                    error: function (err) {
                        alert('Input is not empty !')
                    }
                });
            })
            // from search product submit
            $('#search-form').submit(function (e) {
                e.preventDefault()
                let price1 = parseInt($('input[name="pgt"]').val());
                let price2 = parseInt($('input[name="plt"]').val());
                let check = price1 > price2;
                let sortArr = $('select[name="sort"]').val().split('=');
                const obj = {
                    pgt : check ? price2 : price1,
                    plt : check ? price1 : price2,
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
                // return console.log(obj)
                 $.ajax({
                    type: 'GET',
                    url: "{{route('product.search')}}",
                    data: obj,
                    success: function (rs) {
                        $('#listAllProduct').html('')
                        const {data} = rs;
                        for (let [index, item] of data.entries()) {
                            $('#listAllProduct').append(`
                            <tr class="row_product_${item.id}">
                            <td>${index + 1}</td>
                            <td class="td_title">${item.title} </td>
                            <td class="td_image"><img width="100" height="100" style="object-fit: cover" src="{{asset('/public/images/')}}/${item.image0}" alt=""></td>
                            <td>${item.rate}</td>
                            <td class="td_price">${item.price}</td>
                            <td class="td_selled">${item.selled}</td>
                            <td class="td_content">${item.content}</td>
                            <td class="table-action">
                                    <a href="{{URL::to('/product')}}/${item.id}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                    <a href="" class="btn btn-sm btn-warning" data-id="${item.id}" data-toggle="modal"
                                    data-target="#update_product"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-id="${item.id}" data-toggle="modal"
                                    data-target="#delete_product"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        `)
                        }
                    }
                });
            })

            // handle image change

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
                url:"{{ route('update_image') }}",
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

            // export excel
            $('#btn_export-excel').click(function () {
                $("#table-product").table2excel({
                exclude: ".excludeThisClass",
                name: "Worksheet Name",
                filename: "ProductList.xls", 
                preserveColors: false
            });
            })
           
            
        </script>

    @endsection
