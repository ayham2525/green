@include('admin.layouts.header')
@include('admin.layouts.nav')



<div class="card mb-3">
    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
        <div class="row g-2 align-items-sm-center">
            <div class="col-auto"><img src="../assets/img/icons/connect-circle.png" alt="" height="20" /></div>
            <div class="col">
                <div class="row align-items-center">
                    <div class="col col-lg-11">
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Admin List</h5>
                    </div>

                    <div class="col col-lg-1">
                        <h5 class="fs-0 mb-3 mb-sm-0 text-primary">
                            <button class="btn btn-falcon-primary me-1 mb-1" type="button"data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card-body bg-light border-top">
    <div id=" " data-list='{"valueNames":["id","amount","payment_date","start_date","end_date" , "discount" ,"still" , "pay_method"],"page":5,"pagination":true}'>

        <div class="table-responsive scrollbar">
            <table class="table table-bordered   mb-0 table table-sm table-striped overflow-hidde text-center">
                <thead class="  " style="background-color: #df1a23 ; color:#fff">
                    <tr class="text-center">
                        <th class="sort" data-sort="name">Name</th>
                        <th class="sort" data-sort="email">email</th>
                        <th class="sort" data-sort="age">admin Type</th>
                        <th class="sort" data-sort="age">Action</th>

                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($users  as $user)
                        
                    <tr>
                        <td class="name">{{$user->name}}</td>
                        <td class="email">{{$user->email}}</td>
                        <td class="admin_type">{{$user->admin_type}}</td>
                    
                        <td>
                            <form action="{{ route('admins.destroy', $user->id) }}" method="POST">

                                <button class="btn btn-falcon-primary me-1 mb-1" type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#aca{{ $user->id }}">Edit</button>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>






                        
                        <div class="modal fade" id="aca{{ $user->id }}" data-bs-keyboard="false"
                            data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl mt-6" role="document">
                                <div class="modal-content border-0">
                                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                                            class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button></div>
                                    <div class="modal-body p-0">
                                        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                            <h4 class="mb-1" id="staticBackdropLabel">Edit admin</h4>
                                        </div>
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form action="{{ route('admins.update', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row">



                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                     <div class="mb-3">
                                                                        <label for="organizerSingle2">branch</label>
                                                                        <select class="form-select js-choice" name="branch_id" size="1"  name="organizerSingle" >
                                                                            
                                                                        @foreach ($branch as $item)
 

                                                                        
        <option {{old('branch_id', $item->id) == $user->branch_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->branch_name}}</option>

                                                                        @endforeach
                                                                      </select>
                                                                     </div>
                                    
                                                                </div>
                                                            </div>
                                    
                                    
                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                  
                                                                    <div class="mb-3">
                                                                        <label for="organizerSingle2">academy</label>
                                                                        <select class="form-select js-choice" name="academy_id" size="1"  name="organizerSingle" >
                                                                            
                                                                        @foreach ($academy as $item)
        <option {{old('academy_id', $item->id) == $user->academy_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->academy_name}}</option>

                                                                        <option value="{{$item->id}}">{{$item->academy_name}}</option>
                                                                        @endforeach
                                                                      </select>
                                                                     </div>
                                                                </div>
                                                            </div>
                                    
                                     
                                    
                                    
                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                <div class="form-group">
                                                                  
                                                                    <div class="mb-3">
                                                                        <label for="organizerSingle2">admin type</label>
                                                                        <select class="form-select" name="admin_type"  >
                                       
                                                                       <option value="full_admin" {{ old('admin_type', $user->admin_type) == 'full_admin' ? 'selected' : '' }}>full_admin</option>
                                                                       <option value="branch_admin" {{ old('admin_type', $user->admin_type) == 'branch_admin' ? 'selected' : '' }}>branch_admin</option>
                                                                       <option value="academy_admin" {{ old('admin_type', $user->admin_type) == 'academy_admin' ? 'selected' : '' }}>academy_admin</option>
 

                                    
                                                                       </select>
                                                                     </div>
                                                                </div>
                                                            </div>
                                    
                                    
                                    
                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                <div class="form-group">
                                                                    <strong>name :</strong>
                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        value="{{$user->name}}">
                                                                </div>
                                                            </div>
                                    
                                    
                                    
                                    
                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                <div class="form-group">
                                                                    <strong>email :</strong>
                                                                    <input type="email" name="email"
                                                                        class="form-control" value="{{$user->email}}">
                                                                </div>
                                                            </div>
                                    
                                    
                                                            
                                    
                                                            <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                <div class="form-group">
                                                                    <strong>password :</strong>
                                                                    <input type="password" name="password"
                                                                        class="form-control" placeholder="password"
                                                                         >
                                                                </div>
                                                            </div>
                                                      



                                                     

                                                            <div
                                                                class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>

                                                    </form>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



    
                    @endforeach

                </tbody>
            </table>
        </div>
       
    </div>
</div>





 






 <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Add New Admin</h4>
         </div>
        <div class="p-4">
          <div class="row">
          
            <div class="card-body py-4">
                <form action="{{ route('admins.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                 <div class="mb-3">
                                    <label for="organizerSingle2">branch</label>
                                    <select class="form-select js-choice" name="branch_id" size="1"  name="organizerSingle" >
                                        
                                    @foreach ($branch as $item)
                                    <option value="{{$item->id}}">{{$item->branch_name}}</option>
                                    @endforeach
                                  </select>
                                 </div>

                            </div>
                        </div>


                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              
                                <div class="mb-3">
                                    <label for="organizerSingle2">academy</label>
                                    <select class="form-select js-choice" name="academy_id" size="1"  name="organizerSingle" >
                                        
                                    @foreach ($academy as $item)
                                    <option value="{{$item->id}}">{{$item->academy_name}}</option>
                                    @endforeach
                                  </select>
                                 </div>
                            </div>
                        </div>

 


                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                              
                                <div class="mb-3">
                                    <label for="organizerSingle2">admin type</label>
                                    <select class="form-select js-choice" name="admin_type" size="1"  name="organizerSingle" >
                                        
                                     <option value="full_admin">full admin</option>
                                     <option value="branch_admin">admin branch</option>
                                     <option value="academy_admin">admin academy</option>


                                   </select>
                                 </div>
                            </div>
                        </div>



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>name :</strong>
                                <input type="text" name="name"
                                    class="form-control"
                                    placeholder="name">
                            </div>
                        </div>




                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>email :</strong>
                                <input type="email" name="email"
                                    class="form-control" placeholder="email">
                            </div>
                        </div>


                        

                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>password :</strong>
                                <input type="password" name="password"
                                    class="form-control" placeholder="password"
                                     >
                            </div>
                        </div>


 

                        <div
                            class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                            <button type="submit"
                                class="btn btn-primary">Add</button>
                        </div>
                    </div>

                </form>
            </div>
       


          </div>
        </div>
      </div>
    </div>
  </div>
</div>








 



@include('admin.layouts.footer')
