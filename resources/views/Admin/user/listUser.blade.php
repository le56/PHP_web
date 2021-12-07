@extends('admin_layout')
    @section('dashboard')
      <style>
       
          .table .table-action {
            grid-template-columns: 1fr;
          }
          .table .table-action {
              display: table-cell;
          }
      </style>
        <div class="col-sm-12">
            <div class="container-fluid ">
            <h1 style="color: #fff;text-shadow: 3px 2px 0 #666;margin-bottom: 1rem;" class="text-center text-white">User management</h1>
    <form id="search-form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group col-xs-3">
            <a class="btn btn-block btn-primary" href="{{URL::to('/admin/user/list-user')}}">Reset filter</a>
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
    <div class="form-group col-sm-3 col-xs-6"  style="padding-right:10px;padding-left:30px">
                 
               <select class="form-control" name="type" aria-label="form-select-lg example">
                                       <option value="" selected disabled>All type</option>
                                       <option value="1">Active</option>
                                       <option value="0">Block</option>
                                    </select>
                                </div>
			<div class="form-group col-sm-6 col-xs-6">
				<select data-filter="model" name="sort" class="filter-model filter form-control">
					<option value="" selected disabled>Sort</option>
                    <option value="">All</option>
                    <option value="orderNum=asc">Number of orders of user increase</option>
                    <option value="orderNum=desc">Number of orders of user decrease</option>
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
            <button class="btn btn-block btn-success" id="btn_export-excel" type="button">Export to excel</button>
			</div>
		</form>
                    </div>
                    <table class="table table-hover" id="table-user">
                        <thead>
                        <tr>
                            <th>Index</th>
                             <th>Avatar</th>
                             <th>Email</th>
                             <th>Name</th>
                             <th>Number of orders</th>
                             <th>Active</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="listAllUser">

                        @foreach ($users as $user)
                            <tr class="row_user_{{$user->id}}">
                                <td>{{$loop->index + 1}}</td>
                                <td class="td_avatar"><img width="35" height="35" style="object-fit:cover" src="<?php if(strpos($user->avatar,"https://lh3") === false) echo asset('/public/images')."/".$user->avatar; else echo $user->avatar;  ?>" alt=""></td>
                                <td class="td_email">{{$user->email}}</td>
                                <td class="td_name">{{$user->name}}</td>
                                <td class="td_orderNum">{{$user->orderNum}}</td>
                                <td class="td_active">
                                    @if ($user->active)
                                    <button data-id="{{$user->id}}" class="btn btn-sm btn_toggle_active btn-success">Active</button>
                                    @else
                                    <button data-id="{{$user->id}}" class="btn btn-sm btn_toggle_active btn-danger">Block</button>
                                    @endif
                                </td>
                                <td class="table-action">
                                    <a href="" class="btn btn-sm btn-danger" data-id="{{$user->id}}" data-toggle="modal"
                                    data-target="#delete_user"><i class="fas fa-trash"></i></a>
                            </td>
                                
                            </tr>
                        
                        @endforeach

                        </tbody>
                    </table>
               

            </div>

          
            <!-- Modal delete user -->
            <div class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" class="text-muted">Are you sure you want to delete this user !</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="btn_delete_user">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close Modal -->
            <input type="hidden" value="" name="get_id_user">
        </div>
        <!-- ranger input  -->
        <x-ck-editor />
        <script>
        $(document).ready(function(){
            //current id user//
            var get_id_user;
            // show modal delete
            $('#delete_user').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget)
                get_id_user = button.data('id')
            })
          
            // btn confirm delete
            $('#btn_delete_user').click(() => {
                $.ajax({
                    type: 'delete',
                    url: `{{URL::to('/admin/user/delete/${get_id_user}')}}`,
                    data: {
                        id: get_id_user
                    },
                    success: function (data) {
                        $(`.row_user_${data}`).remove()
                        $('#delete_user').modal('hide')

                        toastMessage({
                        text : "Delete user successfully !",
                        status : true
                    })
                    }
                });
            })

            // handle toggle active account user
            $("#listAllUser").on("click",".btn_toggle_active",function () {
                let id = $(this).attr('data-id');
                $.ajax({
                    type: 'patch',
                    url: `{{URL::to('/admin/user/active/${id}')}}`,
                    data: {
                        id
                    },
                    success: function (data) {
                        $(`.row_user_${data.id} .td_active`).html(`<button data-id="${data.id}" class="btn btn-sm btn_toggle_active ${data.active ? 'btn-success' : 'btn-danger'} ">${data.active ? 'Active' : 'Block'}</button>`)
                        toastMessage({
                        text : `Change to ${data.active ? "active" : "disabled"} successfully !`,
                        status : true
                    })
                    }
                });
            })  
          
            // from search user submit
            
            $('#search-form').submit(function (e) {
                e.preventDefault()
                let selectSortVal = $('select[name="sort"]').val();
                var sortArr = selectSortVal ? selectSortVal.split('=') : "";
                const obj = {
                    active : $('select[name="type"]').val(),
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
                    url: "{{URL::to('/admin/user/search')}}",
                    data: obj,
                    success: function (rs) {
                       $("#listAllUser").html("")
                        const {data} = rs;
                        
                        for (let [index, item] of data.entries()) {
                            $("#listAllUser").append(`
                            <tr class="row_user_${item.id}">
                            <td>${index + 1}</td>
                            <td class="td_avatar"><img width="35" height="35" style="object-fit:cover" src="${item.avatar.includes("https://") ? item.avatar : `{{asset('/public/images')}}/${item.avatar}`}" alt=""></td>
                                <td class="td_email">${item.email}</td>
                                <td class="td_name">${item.name}</td>
                                <td class="td_orderNum">${item.orderNum}</td>
                                <td class="td_active">
                                <button data-id="${item.id}" class="btn btn-sm btn_toggle_active ${item.active ? 'btn-success' : 'btn-danger'} ">${item.active ? 'Active' : 'Block'}</button>
                                </td>
                                <td class="table-action">
                                    <a href="" class="btn btn-sm btn-danger" data-id="${item.id}" data-toggle="modal"
                                    data-target="#delete_user"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        `)
                        }
                    }
                });
            })
        

         
            // export excel
            $('#btn_export-excel').click(() => {
                exportToExel("table-user")
            })  
            
            })
        
        </script>
     

    @endsection
