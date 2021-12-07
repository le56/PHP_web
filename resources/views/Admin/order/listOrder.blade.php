@extends('admin_layout')
    @section('dashboard')
      <style>
         #listAllorder td{
              vertical-align:middle
          }
          .table .table-action {
              display: table-cell;
          }
      </style>
        <div class="col-sm-12">
            <div class="container-fluid ">
            <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin-bottom: 1rem;" class="text-center text-white">Order management</h1>
    <form id="search-form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group col-xs-3">
            <a class="btn btn-block btn-primary" href="{{URL::to('/admin/order/list-order')}}">Reset filter</a>
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
	
      
			<div class="form-group col-sm-3 col-xs-6" style="padding : 0 10px 0 30px">
				<div>
                <input type="date" class="form-control" placeholder="Choose from date" name="tgt">
                </div>
			</div>
            <div class="form-group col-sm-3 col-xs-6">
				<div>
                <input type="date" class="form-control" placeholder="Choose to date" name="tlt">
                </div>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="model" name="sort" class="filter-model filter form-control">
					<option value="" selected disabled>Sort</option>
                    <option value="">All</option>
                    <option value="quantity=asc">Quantity increase</option>
                    <option value="quantity=desc">Quantity decrease</option>
                    <option value="created_at=asc">Time create increase</option>
                    <option value="created_at=desc">Time create decrease</option>
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
            <button class="btn btn-block btn-success" id="btn_export-excel" type="button">Export to excel</button>
			</div>
		</form>
                    </div>
                    <table class="table table-hover" id="table-order">
                        <thead>
                        <tr>
                            <th>Index</th>
                             <th>Email</th>
                             <th>Product ID</th>
                             <th>Product name</th>
                             <th>Quantity</th>
                             <th>Total price</th>
                             <th>Time</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="listAllorder">

                        @foreach ($orders as $order)
                            <tr class="row_order_{{$order->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td class="td_email">{{$order->email}}</td>
                                <td class="td_idProduct">@if($order->product){{$order->product->id}}@else Deleted @endif</td>
                                <td class="td_nameProduct">@if($order->product){{$order->product->title}}@else Deleted @endif</td>
                                <td class="td_quantity">{{$order->quantity}}</td>
                                <td class="td_totalPrice">{{$order->totalPrice}}</td>
                                <td class="td_created_at">{{$order->created_at}}</td>
                                <td class="table-action">
                                    <a href="" class="btn btn-sm btn-danger" data-id="{{$order->id}}" data-toggle="modal"
                                    data-target="#delete_order"><i class="fas fa-trash"></i></a>
                            </td>
                                
                            </tr>
                        
                        @endforeach

                        </tbody>
                    </table>
               

            </div>

          
            <!-- Modal delete order -->
            <div class="modal fade" id="delete_order" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" class="text-muted">Are you sure you want to delete this order !</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="btn_delete_order">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal -->
            <input type="hidden" value="" name="get_id_order">
        </div>
        <!-- ranger input  -->
        <x-ck-editor />
        <script>
       
            //current id order//
            var get_id_order;
            // show modal delete
            $('#delete_order').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                get_id_order = button.data('id')
            })
          
            // btn confirm delete
            $('#btn_delete_order').click(() => {
                $.ajax({
                    type: 'delete',
                    url: `{{URL::to('/admin/order/${get_id_order}')}}`,
                    data: {
                        id: get_id_order
                    },
                    success: function (data) {
                        $(`.row_order_${data}`).remove()
                        $('#delete_order').modal('hide')

                        toastMessage({
                        text : "Delete order successfully !",
                        status : true
                    })
                    }
                });
            })

           
          
            // from search order submit
            $('#search-form').submit(function (e) {
                e.preventDefault()
                let selectSortVal = $('select[name="sort"]').val();
                var sortArr = selectSortVal ? selectSortVal.split('=') : "";
                const obj = {
                   tgt : $('input[name="tgt"]').val(),
                   tlt : $('input[name="tlt"]').val(),
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
                    url: "{{URL::to('/admin/order/search')}}",
                    data: obj,
                    success: function (rs) {
                        $('#listAllorder').html('')
                        const {data} = rs;
                        for (let [index, item] of data.entries()) {
                            $('#listAllorder').append(`
                            <tr class="row_order_${item.id}">
                            <td>${index + 1}</td>
                            <td class="td_email">${item.email}</td>
                                <td class="td_idProduct">${item.product.id}</td>
                                <td class="td_nameProduct">${item.product.title}</td>
                                <td class="td_quantity">${item.quantity}</td>
                                <td class="td_totalPrice">${item.totalPrice}</td>
                                <td class="td_created_at">${formatDate(item.created_at)}</td>
                                <td class="table-action">
                                    <a href="" class="btn btn-sm btn-danger" data-id="${item.id}" data-toggle="modal"
                                    data-target="#delete_order"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        `)
                        }
                    }
                });
            })

         
            // export excel
            $('#btn_export-excel').click(() => {
                exportToExel("table-order")
            })   
        </script>
     

    @endsection
