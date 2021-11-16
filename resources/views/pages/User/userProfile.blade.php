@extends('welcome')
@section('teammate')
<style>
    .head {
        margin-top: 2rem !important;
    }
    .head img {
        border-radius: 50%;
        object-fit: cover;
        width: 96px;
        height: 96px;
    }
    .col-3 p {
        margin-bottom: .75rem !important;
    }
    .container_avt {
        margin: 0 !important;
    
    }
    .container_avt label {
        margin-bottom: 0 !important;
        cursor: pointer;
    }
    .col-sm-6 p {
        margin-bottom: .5rem !important;
    }
    .container_avt .mr-3 {
        margin-right: 10px !important;
    }
    .contain_action {
        margin: 1rem 0 1rem 0 !important;
    }
</style>
<form action="{{URL::to('/profile')}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PUT') }}
<div class="container head mt-4 mb-2">
           <h3 class="ml-4"><b>General information</b></h3>
           <div class="row mt-4">
           <div class="col-md-2  mb-4">
              <div class="text-center">
                  <img id="imgAvatarDispaly" src="<?php if(strpos(auth()->user()->avatar,"https://lh3") === false) echo asset('/public/images')."/".auth()->user()->avatar; else echo auth()->user()->avatar;  ?>" alt="">
              </div>
           </div>
           <div class="col-md-10 mb-4">
               <div class="row">
                  <div class="col-3">
                       <p class="text-muted">ID</p>
                       <p>IDENTITY{{auth()->user()->id}}</p>
                  </div>
                   <div class="col-3">
                       <p class="text-muted">Register date</p>
                       <p>{{auth()->user()->created_at}}</p>
                  </div>
               </div>
               <div class="row align-items-center container_avt mt-3">
                   <button type="button" class="btn btn-primary mr-3 " data-toggle="modal" data-target="#changePassModal">Change password</button>
                   <label for="avatar" class="mr-3"><i style='color:#ff6a39' class="fas fa-camera mr-2"></i> Change avatar</label>
                   <input type="file" style="display: none" value="" name="avatar" id="avatar">
                   <label><i style='color: red' class="fas fa-trash mr-2"></i> Defalut avatar</label>
               </div>
           </div>
       </div>
      
      </div>

        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-6">
                    <p>Name</p>
                    <input class="form-control" value="{{auth()->user()->name}}" type="text" name="name">
                </div>
                <div class="col-sm-6">
                     
                    <p>Birthday</p>
                    <input class="form-control" type="date" value="{{auth()->user()->birthday}}"   name="birthday">
                  
                </div>
            </div>

            <div class="row mt-4 contain_btn">
                <div class="col-sm-6">
                    <p>Phone</p>
                    <input class="form-control" value="{{auth()->user()->phone}}" type="number" name="phone">
                </div>
                <div class="col-sm-6">
                    <p>Email</p>
                    <input class="form-control" readonly style="background-color:#171e22 !important"  placeholder="{{auth()->user()->email}}">
                  
                </div>
            </div>
            
   
            <div class="row ml-3 mt-4 mb-5 contain_action">
                <button type="submit" class="btn btn-primary mr-4" >Save</button>
                <a href="{{URL::to('/')}}" class="btn btn-secondary">Close</a>
            </div>
        </div>
        </form>
  
         <div class="modal " tabindex="-1" id="changePassModal" >
            <div class="modal-dialog " style="max-width: 500px;top:50%;transform: translateY(-50%);"> 
                <div class="modal-content">
               
                <div class="modal-body">
                   <form action="">
                       <div class="form-group">
                            <label for="exampleInputPassword1">Old password</label>
                            <input type="password" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">New password</label>
                            <input type="password" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">New password repeat</label>
                            <input type="password" class="form-control">
                        </div>
                   </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        <script>
            $('#avatar').change((e) => {
                read(e.target.files[0],"imgAvatarDispaly");
            })
        </script>
    <x-upload-image></x-upload-image>
 @endsection