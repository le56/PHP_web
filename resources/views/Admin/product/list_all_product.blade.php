@extends('admin_layout')
    @section('dashboard')
    
        <div class="col-sm-12">
            <div class="container-fluid ">
            <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin-bottom: 1rem;" class="text-center text-white">Product management</h1>
    <form id="search-form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group col-xs-3">
            <a class="btn btn-block btn-primary" href="{{URL::to('/admin/product/list-product')}}">Reset filter</a>
			</div>
			<div class="form-group col-xs-6" style="padding : 0 10px">
				<input class="form-control" type="text" name='search' placeholder="Search" />
			</div>
			<div class="form-group col-xs-3" style="padding-right:0;padding-left: 23px;">
				<button type="submit" class="btn btn-block btn-primary">Search</button>
			</div>
      
		</div>
	</div>
	<div class="row" id="filter" style="padding: 0 30px;">
	
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
                            <th>Remain</th>
                            <th>Content</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="listAllProduct">

                        @foreach ($products as $product)
                            <tr class="row_product_{{$product->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td class="td_title">{{$product->title}} </td>
                                <td class="td_image"><img width="100" height="100" style="object-fit: cover"
                                                        src="{{ asset('public/images/'.$product->image0) }}" alt="">
                                </td>
                                <td>{{$product->rate}}</td>
                                <td class="td_price">{{$product->price}}</td>
                                <td class="td_selled">{{$product->selled}}</td>
                                <td class="td_quantityRemain">{{$product->quantityRemain}}</td>
                                <td class="td_content">{{$product->content}}</td>
                                <td class="table-action">
                                 <div>
                                 <a style="display:block;margin-bottom: .5rem;" href="{{URL::to('/product')}}/{{$product->id}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                    <a style="display:block;margin-bottom: .5rem;" href="" class="btn btn-sm btn-primary" data-id="{{$product->id}}" data-toggle="modal"
                                    data-target="#update_quantity"><i class="fas fa-plus-square"></i></a> <br/>
                                    <a href="" class="btn btn-sm btn-warning" data-id="{{$product->id}}" data-toggle="modal"
                                    data-target="#update_product"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-id="{{$product->id}}" data-toggle="modal"
                                    data-target="#delete_product"><i class="fas fa-trash"></i></a>
                                 </div>
                            </td>
                                
                            </tr>
                        
                        @endforeach

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

            <!-- Modal delete product -->
            <div class="modal fade" id="update_quantity" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" class="text-muted">Enter quantity that you want to add in this product !</h5>
                        </div>
                        <div class="modal-body">
                            <input type="number" class="form-control"  id="quantity_add">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_confirm_add_quantity">Comfirm</button>
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

                                    <input type="hidden" name="images[]" id="imageArr">
                                  
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
                                    <label for="">Price import</label>
                                    <input type="number" class="form-control" aria-describedby="nameHelp"
                                        placeholder="Enter number" name="priceImport">
                                </div>

                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" aria-describedby="nameHelp"
                                        placeholder="Enter number" name="price">
                                </div>

                                <div class="form-group">
                                    <label for="">Quantity remain</label>
                                    <input type="number" class="form-control" aria-describedby="nameHelp"
                                        placeholder="Enter number" name="quantityRemain">
                                </div>

                            </form>
                            <br/>
                        <div class="row" id="list_images">                         
                            
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btn_close_update">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_confirm_update">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal -->
            <input type="hidden" value="" name="get_id_product">
        </div>
        <!-- ranger input  -->
        <x-ck-editor />
        <script>
       
            //current id product//
            var get_id_product;
            //current images name arr product//
            var get_images_name_product = [];
            // show modal delete
            $('#delete_product').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                get_id_product = button.data('id')
            })
             // show modal add quantity
             $('#update_quantity').on('show.bs.modal', function (event) {
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
                    $('#update_product input[name="quantityRemain"]').val(data.quantityRemain)
                    $('#update_product input[name="priceImport"]').val(data.priceImport)
                    editor.setData(data.description);
                    $('#editor').val(data.description)
                    // load image 
                    loadImageUpdaeModel(data.images);
                    // set images arr for current images name arr
                    get_images_name_product = data.images;
                    $('select[name="category"]').val(data.category)
                    $('input[name="_id_product"]').val(data.id)             
                })
            })
            // confirm update product
            $('#btn_confirm_update').click((e) => {
            $('#editor').val(editor.getData())
            $("#imageArr").val(get_images_name_product);   
                $.ajax({
                    type: 'put',
                    dataType: "json",
                    url: "{{ route('product.update') }}",
                    data: $('#update_product_form').serialize(),
                    success: function (data) {
                        $(`.row_product_${data.id} .td_title`).text(data.title)
                        $(`.row_product_${data.id} .td_content`).text(data.content)
                        $(`.row_product_${data.id} .td_price`).text(data.price)
                        $(`.row_product_${data.id} .td_quantityRemain`).text(data.quantityRemain)
                        $(`.row_product_${data.id} .td_image img`).attr('src', `{{asset('/public/images/')}}/${data.image0}`)
                        get_images_name_product = [];
                        $('#update_product').modal('hide')
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            })
            // from search product submit
            $('#search-form').submit(function (e) {
                e.preventDefault()
                let price1 = parseInt($('input[name="pgt"]').val());
                let price2 = parseInt($('input[name="plt"]').val());
                let check = price1 > price2;
                let selectSortVal = $('select[name="sort"]').val();
                var sortArr = selectSortVal ? selectSortVal.split('=') : "";
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
                            <td class="td_quantityRemain">${item.quantityRemain}</td>
                            <td class="td_content">${item.content}</td>
                            <td class="table-action">
                                  <div>
                                  <a style="display:block;margin-bottom: .5rem;" href="{{URL::to('/product')}}/${item.id}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                                    <a style="display:block;margin-bottom: .5rem;" href="" class="btn btn-sm btn-primary" data-id="${item.id}" data-toggle="modal"
                                    data-target="#update_quantity"><i class="fas fa-plus-square"></i></a> <br/>
                                    <a href="" class="btn btn-sm btn-warning" data-id="${item.id}" data-toggle="modal"
                                    data-target="#update_product"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" data-id="${item.id}" data-toggle="modal"
                                    data-target="#delete_product"><i class="fas fa-trash"></i></a>
                                  </div>
                            </td>
                        </tr>
                        `)
                        }
                    }
                });
            })

            // handle image change
            $('#list_images').on("change","input[type='file']", function(e){
                const file = e.target.files[0]
                const data_id = $(this).attr("data-id")
                  upload(file,data_id,"_id_product",null)
            })
            // export excel
            $('#btn_export-excel').click(() => {
                exportToExel("table-product")
            })   
           // function load image update model product
            function loadImageUpdaeModel(imagenames) {
                $('#list_images').html('')
                imagenames.forEach((img,index)=>{
                    $('#list_images').append(`
                    <label for="file${index}" class="col-sm-6 item-image pb-3">
                                <div>
                                <img src="{{asset('/public/images/${img}')}}" id="image${index}" alt="" class="file-img">
                                <input type="file" data-id="image${index}" id="file${index}" style="display: none">
                                </div>
                            </label>
                    `)
                })
            }
            // handle close model update 
            $('#btn_close_update').click(() => {
                $.ajax({
                    type: 'delete',
                    dataType: "json",
                    url: "{{ route('product.deleteMuti') }}",
                    data: {
                        _id_product : get_id_product,
                        images : get_images_name_product,
                        type : "product"
                    },
                    success: function (data) {
                        get_images_name_product = [];
                        $('#update_product').modal('hide')
                    },
                });
            })
            // handle add quantity product
            $('#btn_confirm_add_quantity').click(()=> {
                $.ajax({
                    type: 'patch',
                    dataType: "json",
                    url: `{{URL::to('/admin/product/update_quantity/${get_id_product}')}}`,
                    data: {
                       quantity : $('#quantity_add').val(),
                    },
                    success: function (data) {
                        $(`.row_product_${data.id} .td_quantityRemain`).text(data.quantityRemain)
                        $('#update_quantity').modal('hide')
                        $('#quantity_add').val('')
                    },
                })
            })
            
        </script>
        <x-upload-image></x-upload-image>

    @endsection
