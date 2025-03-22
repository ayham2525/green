@include('admin.layouts.header')
@include('admin.layouts.nav')
<?php use Carbon\Carbon;
 
?>
 



@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


<div class="row g-3 mb-3">
    


    <div class="col-xxl-12 col-lg-12 ">
        <div class="card bg-light my-3 mt-4">
            <div class="card-body p-3 ">
                <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item "  > <a href="{{url('branch')}}/{{$registered->branch_student->id}}">{{ $registered->branch_student->branch_name }}</a></li>
                      <li class="breadcrumb-item "  > <a href="{{url('academy')}}/{{$registered->academy_student->id}}">{{ $registered->academy_student->academy_name }}</a></li>
                      <li class="breadcrumb-item">{{$registered->name}}</li>

 
                    </ol>
                  </nav>
            </div>
        </div>


      

    </div>

</div>




<div class="card mb-3">
    <div class="card-header">
        <div class="row">


            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Full Name : {{ $registered->name }}</h5>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-falcon-default btn-sm" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <span class="fas fa-pencil-alt fs--2 me-1"></span>Add Payment</a>

                        <a class="btn btn-falcon-default btn-sm" data-bs-toggle="modal"
                        data-bs-target="#uniform">
                            <span class="fas fa-pencil-alt fs--2 me-1"></span>Add Uniform</a>
                    </div>
					
					        <form action="{{ route('student.destroy', $registered->id) }}" method="POST">
                            <input type="hidden" name="academy_id" value="{{$registered->academy_id}}">

                        @csrf
                        @method('DELETE')
								          @if ((auth()->user()->admin_type == 'full_admin')  )

                        <button type="submit" class="btn btn-danger btn-sm mt-3 btn-block">Delete</button>
								@endif
                    </form>

					
					
                </div>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">Student Status  : </p>
               <b> <p class="fs--1 mb-0 text-600">Active </p></b>
            </div>

            <div class="flex-1">
                <p class="mb-0">Student was created</p>
                <p class="fs--1 mb-0 text-600">{{ $registered->created_at }}</p>
            </div>


            
 
 
        </div>
    </div>
</div>


<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Details</h5>
            </div>
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm " data-bs-toggle="modal" data-bs-target="#details" href="#!"><span
                        class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a></div>
        </div>
    </div>
    <div class="card-body bg-light border-top">
        <div class="row">
            <div class="col-lg col-xxl-5">
                <h6 class="fw-semi-bold ls mb-3 text-uppercase">Account Information</h6>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">ID</p>
                    </div>
                    <div class="col">{{ $registered->id }}</div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Branch </p>
                    </div>
                    <div class="col">{{ $registered->branch_student->branch_name }}</div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Academy</p>
                    </div>
                    <div class="col">{{ $registered->academy_student->academy_name }}</div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">email</p>
                    </div>
                    <div class="col">
                        <div class="col">{{ $registered->email }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-0">Phone Number</p>
                    </div>
                    <div class="col">
                        <div class="col">{{ $registered->phone }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Nationality</p>
                    </div>
                    <div class="col"> {{ $registered->nationality }}</div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Address</p>
                    </div>
                    <div class="col">
                        <div class="col"> {{ $registered->address }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Birht Date</p>
                    </div>
                    <div class="col"> {{ $registered->birth_date }}</div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-0">Join Date</p>
                    </div>
                    <div class="col">
                        <p class="fw-semi-bold mb-0">{{ $registered->reg_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row">
    @foreach ($uniform->uniform_student as $item)
        
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-4.png);opacity: 0.7;"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">


              <div class="row">
             <div class="col-lg-10">
                <h5>Uniform Details</h5>

             </div>

             <div class="col-lg-2">
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span style="font-size:20px" class="  far fa-edit"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update">
                         <a class="dropdown-item" data-bs-toggle="modal"
                         data-bs-target="#edituniform{{$item->id}}">Edit</a>
                      <div class="dropdown-divider"></div>

                      <form action="{{route('uniform.destroy' , $item->id)}}" method="POST">

 
                        @csrf

                        <input type="hidden" name="registerd_id"
                        value="{{ $item->registerd_id }}">

                        @method('DELETE')
 
                        <button type="submit" class="dropdown-item">Delete</button>
                    </form>


                    </div>
                  </div>
             </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                    <p class=""><b>Order Date</b> : {{$item->order_date}}</p>

                    <p class=""> <b>Size</b>  : {{$item->size}}</p>

                    <div>
                        <strong class="me-2">office status: </strong>
                        @if($item->office_status == 'delivered')
                        <div class="badge rounded-pill badge-soft-warning fs--2">{{$item->office_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                        @elseif($item->office_status == 'received')
                        <div class="badge rounded-pill badge-soft-success fs--2">{{$item->office_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                         @else
                         <div class="badge rounded-pill badge-soft-danger fs--2">{{$item->office_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                         @endif
                     </div>

                </div>

                <div class="col-lg-6">  
                    <p class=""> <b>Amount</b>  : {{$item->amount}}</p>
                    
                     <div>
                        <strong class="me-2">Branch status : </strong>
                        @if($item->branch_status == 'received')
                      <div class="badge rounded-pill badge-soft-success fs--2">{{$item->branch_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>
                      @elseif($item->branch_status == 'ordered')

                      <div class="badge rounded-pill badge-soft-warning fs--2">{{$item->branch_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>

                      @else
                        <div class="badge rounded-pill badge-soft-danger fs--2">{{$item->branch_status}}<span class="fas fa-check ms-1" data-fa-transform="shrink-2"></span></div>

                       @endif
                    </div>

                </div>

                
                
              </div>
  
              
            </div>
          </div>
    </div>

  


    <div class="modal fade" id="edituniform{{$item->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body p-0">

                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="mb-0">Uniform Details</h5>
                                </div>
                                <form action="{{ route('uniform.update' , $item->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                       
                                    <div class="card-body bg-light">

                                        <div class="row gx-3 mb-3">
                                            @csrf

                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Branch</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->branch_student->branch_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ $registered->branch_id }}">
                                                </div>


                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Academy</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->academy_student->academy_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="academy_id"
                                                        value="{{ $registered->academy_id }}">
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Student</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->name }}" disabled readonly>
                                                    <input type="hidden" name="registerd_id"
                                                        value="{{ $registered->id }}">
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Order Date</label>
                                                        <input type="date" class="form-control" name="order_date"
                                                        placeholder="" value="{{$item->order_date}}" >
                                                </div>

                                            </div>




                                             <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">size</label>
                                                        <select class="form-select" name="size"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="6xs-24-4" {{ old('size', $item->size) == '6xs-24-4' ? 'selected' : '' }} >6xs-24-4</option>
                                                        <option value="5xs-26-6" {{ old('size', $item->size) == '5xs-26-6' ? 'selected' : '' }}   >5xs-26-6</option>
                                                        <option value="4xs-28-8" {{ old('size', $item->size) == '4xs-28-8' ? 'selected' : '' }}   >4xs-28-8</option>
                                                        <option value="3xs-30-10" {{ old('size', $item->size) == '3xs-30-10' ? 'selected' : '' }}   >3xs-30-10</option>
                                                        <option value="2xs-32-12" {{ old('size', $item->size) == '2xs-32-12' ? 'selected' : '' }}   >2xs-32-12</option>
                                                        <option value="1xs-34-14" {{ old('size', $item->size) == '1xs-34-14' ? 'selected' : '' }}   >1xs-34-14</option>
                                                        <option value="xs" {{ old('size', $item->size) == 'xs' ? 'selected' : '' }}   >xs</option>
                                                        <option value="S" {{ old('size', $item->size) == 'S' ? 'selected' : '' }}   >S</option>
                                                        <option value="M" {{ old('size', $item->size) == 'M' ? 'selected' : '' }}   >M</option>
                                                        <option value="L" {{ old('size', $item->size) == 'L' ? 'selected' : '' }}   >L</option>
                                                        <option value="XL" {{ old('size', $item->size) == 'XL' ? 'selected' : '' }}   >XL</option>
                                                        <option value="XXL" {{ old('size', $item->size) == 'XXL' ? 'selected' : '' }}   >XXL</option>
                                                        <option value="XXXL" {{ old('size', $item->size) == 'XXXl' ? 'selected' : '' }}   >XXXl</option>
 





                                                    </select>
                                                </div>

                                            </div>


                                    


                                            <div class="col-4 col-sm-4">

                                                <div class="">
                                                    <label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >Amount </label>
                                                <input class="form-control" name="amount" type="text" value="{{$item->amount}}" />
                                                </div>
    
      
      
                                              </div>
      


                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">office status</label>
                                                        <select class="form-select" name="office_status" 
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="non" {{ old('office_status', $item->office_status) == 'non' ? 'selected' : '' }} >non</option>
                                                        <option value="delivered" {{ old('office_status', $item->office_status) == 'delivered' ? 'selected' : '' }}  >delivered</option>

                                                        <option value="received"  {{ old('office_status', $item->office_status) == 'received' ? 'selected' : '' }} >received</option>

                                                    </select>
                                                </div>

                                            </div>
                                            

                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">branch status</label>
                                                        <select class="form-select" name="branch_status"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="non"  {{ old('branch_status', $item->branch_status) == 'non' ? 'selected' : '' }} >non</option>
                                                        <option value="ordered"  {{ old('branch_status', $item->branch_status) == 'ordered' ? 'selected' : '' }} >ordered</option>

                                                        <option value="received"  {{ old('branch_status', $item->branch_status) == 'received' ? 'selected' : '' }} >received</option>
                                                        
                                                     </select>
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">
        
                                                <div class="">
                                                    <label
                                                        class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                       >Payment Method </label>
                                                    <select class="form-select" name="p_method"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="card" {{ old('p_method', $item->p_method) == 'card' ? 'selected' : '' }}>Card</option>
                                                        <option value="cash" {{ old('p_method', $item->p_method) == 'cash' ? 'selected' : '' }}>cash</option>
                                                        <option value="online" {{ old('p_method', $item->p_method) == 'online' ? 'selected' : '' }}>online</option>

                                                    </select>
                                                </div>




                                            </div>


                                        </div>
                                 
 



                                        <div class="col-12 col-sm-12">

                                          <label
                                          class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                          >Note </label>
                                      <input class="form-control" name="note" type="text" />


                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
</div>





    @endforeach


    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-4.png);opacity: 0.7;"></div>
            <!--/.bg-holder-->
            <div class="card-body position-relative">
              <h5>Program Details</h5>

              <div>
                <strong class="me-2"><span class="fs--1"></span> Programe Name  : </strong> {{$registered->program_student->programe_name}} <br>
                <strong class="me-2"><span class="fs--1"></span> Days  : </strong> {{$registered->program_student->days}} <br>
                <strong class="me-2"><span class="fs--1"></span> Price  : </strong> {{$registered->program_student->price}} <br>
                <strong class="me-2"><span class="fs--1"></span> Class  : </strong> {{$registered->program_student->classes}} <br>


 
              </div>
            </div>
          </div>
    </div>


</div>



<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Payments</h5>
            </div>

        </div>
    </div>
    <div class="card-body bg-light border-top">
        <div id=" " data-list='{"valueNames":["id","amount","payment_date","start_date","end_date" , "discount" ,"still" , "pay_method"],"page":5,"pagination":true}'>
  
            <div class="table-responsive scrollbar">
                <table class="table table-bordered  fs--2 mb-0 table table-sm table-striped overflow-hidde text-center">
                    <thead class="  " style="background-color: #df1a23 ; color:#fff">
                        <tr class="text-center">
                            <th   data-sort="name">id</th>
                            <th   data-sort="email">Amount </th>
                            <th    data-sort="age">payment date</th>
                            <th   data-sort="age">start date</th>
                            <th   data-sort="age">end date</th>
                            <th   data-sort="age">discount</th>
                            <th   data-sort="age">reset_num</th>
                            <th   data-sort="age">Payment Method</th>
                            <th  data-sort="age">Action</th>

                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($payments->payment_student  as $x)
                            
                        <tr>
                             <td>{{$x->id}}</td>
                             <td>{{$x->amount}}AED</td>
                             <td>{{$x->payment_date}}</td>
                             <td>{{$x->start_date}}</td>
                             <td>{{$x->end_date}}</td>
                             <td>{{$x->discount}}</td>
                             <td>{{$x->still}}</td>
                             <td>{{$x->pay_method}}</td>
                             <td>
                              

                                  @if ((auth()->user()->admin_type == 'full_admin')  )
								 
								 
								   <div class="btn-group mb-2" role="group" aria-label="Third group">
                                    <button class="btn btn-sm btn-falcon-primary me-1 mb-1" type="button"
                                    data-bs-toggle="modal" data-bs-target="#pay{{ $x->id }}" >edit</button>
                                    
                                  </div>
								 
								 

                                  <div class="btn-group mb-2" role="group" aria-label="Third group">

                                    <form action="{{ route('payment.destroy', $x->id) }}" method="POST">

                                   

                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-sm btn-falcon-danger me-1 mb-1" type="submit">Delete</button>

                                     </form>
                                    
                                    
                                  </div>
                                  @endif
                             </td>



                 
                        </tr>

 
                          </div>


                   <div class="modal fade" id="pay{{$x->id}}" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl mt-6" role="document">
                              <div class="modal-content border-0">
                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="modal-body p-0">
                                  <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                    <h4 class="mb-1" id="staticBackdropLabel">Edit Payment</h4>
                                   </div>
                                  <div class="p-4">
                                    <div class="row">
           

                                        <form action="{{ route('payment.update' , $x->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')


                                            <div class="col-6 col-sm-4">

                                                <div class=""> 
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ $registered->branch_id }}">
                                                </div>
                    
                    
                                            </div>
                    
                    
                                            <div class="col-6 col-sm-4">
                    
                                                <div class=""> 
                                                    <input type="hidden" name="academy_id"
                                                        value="{{ $registered->academy_id }}">
                                                </div>
                    
                                            </div>
                    
                    
                                            <div class="col-6 col-sm-4">
                    
                                                <div class="">
                                              
                                                    <input type="hidden" name="registerd_id"
                                                        value="{{ $registered->id }}">
                                                </div>
                    
                                            </div>

                                       
                                                <div class="row gx-3 mb-3">
        
        
        
                                                    <div class="col-6 col-sm-3"><label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                            >Payment Date</label><input class="form-control"
                                                           name="payment_date" value="{{$x->payment_date}}"  type="date" /></div>
                                                    <div class="col-6 col-sm-3"><label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                             >Start Date</label><input class="form-control"
                                                            name="start_date" value="{{$x->start_date}}"  type="date" /></div>
                                                    <div class="col-6 col-sm-3"><label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                            >End Date</label><input class="form-control"
                                                            name="end_date"  value="{{$x->end_date}}" type="date" /></div>


                                                            
                                                    <div class="col-6 col-sm-3">

                                                        <div class="">
                                                            <label
                                                                class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                               >renewal  </label>
                                                            <select class="form-select" name="status_student"
                                                                id="bootstrap-wizard-validation-gender">
                                                 
                <option value="renewal" {{ old('status_student', $x->status_student) == 'renewal' ? 'selected' : '' }}>renewal</option>
                  <option value="new" {{ old('status_student', $x->status_student) == 'new' ? 'selected' : '' }}>new</option>

        
                                                            </select>
                                                        </div>
          
                                                    </div>

                                                </div>
        
        
                                                <div class="row gx-3 mb-3">
        
        
        
                                                    <div class="col-6 col-sm-3">
                                                        <label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                            >Amount </label>
                                                        <input class="form-control" name="amount" type="text" value="{{$x->amount}}" />
                                                    </div>
                                                    <div class="col-6 col-sm-3"><label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                             >Discount </label><input class="form-control"
                                                            name="discount" type="text" value="{{$x->discount}}" /></div>
                                                    <div class="col-6 col-sm-3"><label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                            >reset number</label><input class="form-control"
                                                            name="still" type="text" value="{{$x->still}}" /></div>
                                                    <div class="col-6 col-sm-3">
        
                                                        <div class="">
                                                            <label
                                                                class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                               >Payment Method </label>
                                                            <select class="form-select" name="pay_method"
                                                                id="bootstrap-wizard-validation-gender">
                                                                <option value="card" {{ old('pay_method', $x->pay_method) == 'card' ? 'selected' : '' }}>Card</option>
                                                                <option value="cash" {{ old('pay_method', $x->pay_method) == 'cash' ? 'selected' : '' }}>cash</option>
                                                                <option value="online" {{ old('pay_method', $x->pay_method) == 'online' ? 'selected' : '' }}>online</option>

                                                            </select>
                                                        </div>
        
        
        
        
                                                    </div>
                                                </div>
        
        
        
                                              <div class="row">
                                                  
                                                <div class="col-6 col-sm-6">
        
                                                    <label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >Class Time From </label>
                                                <input class="form-control" name="start_time" type="time" value="{{$x->start_time}}"  />
          
          
                                                  </div>
        
                                                  
                                                  
                                                <div class="col-6 col-sm-6">
        
                                                    <label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >To </label>
                                                <input class="form-control" name="end_time" type="time" value="{{$x->end_time}}" />
          
          
                                                  </div>
                                              </div>
          
        
        
                                                <div class="col-12 col-sm-12">
        
                                                  <label
                                                  class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                  >Note </label>
                                              <input class="form-control" name="note" type="text" value="{{$x->note}}" />
        
        
                                                </div>
        
        
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
        
                                            </div>
                                        </form>
                                  
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1"
                    type="button" title="Previous" data-list-pagination="prev"><span
                        class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button"
                    title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>



    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Attendance</h5>
                </div>
    
            </div>
        </div>
        <div class="card-body bg-light border-top">
            <div id=" " data-list='{"valueNames":["id","amount","payment_date","start_date","end_date" , "discount" ,"still" , "pay_method"],"page":5,"pagination":true}'>
      
                <div class="table-responsive scrollbar">
                    <table class="table table-bordered  fs--2 mb-0 table table-sm table-striped overflow-hidde text-center">
                        <thead class="  " style="background-color: #df1a23 ; color:#fff">
                            <tr class="text-center">
                                 <th   data-sort="name">Date</th>
                                <th   data-sort="name">Time</th>
     
               
     
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($attend->attendance_student  as $x)
                                
                            <tr>
                                  <td>{{$x->date}}</td>
                                 <td>{{$x->time}}</td>

    
    
    
                     
                            </tr>
    
    
                            
                              </div>
    
    
    
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1"
                        type="button" title="Previous" data-list-pagination="prev"><span
                            class="fas fa-chevron-left"></span></button>
                    <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button"
                        title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                </div>
            </div>
        </div>
    
    </div>

    


</div>






<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body p-0">

                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="mb-0">Payment Details</h5>
                                </div>
                                <form action="{{ route('payment.store') }}" method="POST">

                                    <div class="card-body bg-light">

                                        <div class="row gx-3 mb-3">
                                            @csrf

                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Branch</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->branch_student->branch_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ $registered->branch_id }}">
                                                </div>


                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Academy</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->academy_student->academy_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="academy_id"
                                                        value="{{ $registered->academy_id }}">
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Student</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->name }}" disabled readonly>
                                                    <input type="hidden" name="registerd_id"
                                                        value="{{ $registered->id }}">

                                                        <input type="hidden" name="registerd_name"
                                                        value="{{ $registered->name }}">

                                                        <input type="hidden" name="registerd_email"
                                                        value="{{ $registered->email }}">


                                                </div>

                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">



                                        
											
											
											
 											
											                <div class="col-6 col-sm-3"><label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >Payment Date</label><input class="form-control"
                                        name="payment_date"  type="date"   /></div>
											
					 
											
										 
											 

											
                                             <div class="col-6 col-sm-3"><label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                     >Start Date</label><input class="form-control"
                                                    name="start_date"  type="date" /></div>
                                            <div class="col-6 col-sm-3"><label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >End Date</label><input class="form-control"
                                                    name="end_date"  type="date" /></div>


                                                    <div class="col-6 col-sm-3">

                                                        <div class="">
                                                            <label
                                                                class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                               >renewal  </label>
                                                            <select class="form-select" name="status_student"
                                                                id="bootstrap-wizard-validation-gender">
                                                                <option value="renewal">renewal</option>
                                                                <option value="new">new</option>
        
                                                            </select>
                                                        </div>
          
                                                    </div>

                                        </div>


                                        <div class="row gx-3 mb-3">



                                            <div class="col-6 col-sm-3">
                                                <label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >Amount </label>
                                                <input class="form-control" name="amount" type="text" />
                                            </div>
                                            <div class="col-6 col-sm-3"><label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                     >Discount </label><input class="form-control"
                                                    name="discount" type="text" /></div>
                                            <div class="col-6 col-sm-3"><label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >reset number</label><input class="form-control"
                                                    name="still" type="text" /></div>
                                            <div class="col-6 col-sm-3">

                                                <div class="">
                                                    <label
                                                        class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                       >Payment Method </label>
                                                    <select id="mySelect" class="form-select" name="pay_method" 
                                                         >
                                                        <option value="card">Card</option>
                                                        <option value="cash">cash</option>
														                                                        <option value="online">online</option>

                                                        <option value="45639">link</option>
                                                        <option value="45648">Tamara</option>
                                                        <option value="46230">Tabby</option>
                    

                                                    </select>


                                                    


                                               

                                                    <div class="row gx-3 mb-3">

                                                    <div class="col-lg-12 "  id="myTextbox" style="display:none;margin-top:10px">
                                                        <label
                                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                            >phone number </label>
                                                        <input class="form-control" name="phone_number" type="text" placeholder="+971" value="+971" />
                                                    </div>
                                                </div>




                                                </div>
  
                                            </div>
                                        </div>



                                      <div class="row">
                                          
                                        <div class="col-6 col-sm-6">

                                            <label
                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                            >Class Time From </label>
                                        <input class="form-control" name="start_time" type="time" />
  
  
                                          </div>

                                          
                                          
                                        <div class="col-6 col-sm-6">

                                            <label
                                            class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                            >To </label>
                                        <input class="form-control" name="end_time" type="time" />
  
  
                                          </div>
                                      </div>
  


                                        <div class="col-12 col-sm-12">

                                          <label
                                          class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                          >Note </label>
                                      <input class="form-control" name="note" type="text" />


                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
</div>



<div class="modal fade" id="uniform" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
                    aria-label="Close"></button></div>
            <div class="modal-body p-0">

                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="mb-0">Uniform Details</h5>
                                </div>
                                <form action="{{ route('uniform.store') }}" method="POST">

                                    <div class="card-body bg-light">

                                        <div class="row gx-3 mb-3">
                                            @csrf

                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Branch</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->branch_student->branch_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ $registered->branch_id }}">
                                                </div>


                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Academy</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->academy_student->academy_name }}"
                                                        disabled readonly>
                                                    <input type="hidden" name="academy_id"
                                                        value="{{ $registered->academy_id }}">
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class=""><label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Student</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="{{ $registered->name }}" disabled readonly>
                                                    <input type="hidden" name="registerd_id"
                                                        value="{{ $registered->id }}">
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">Order Date</label>
                                                        <input type="date" class="form-control" name="order_date"
                                                        placeholder="" value="{{$registered->order_date}}" >
                                                </div>

                                            </div>




                                             <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">size</label>
                                                        <select class="form-select" name="size"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="6xs-24-4">6xs-24-4</option>
                                                        <option value="5xs-26-6">5xs-26-6</option>
                                                        <option value="4xs-28-8">4xs-28-8</option>
                                                        <option value="3xs-30-10">3xs-30-10</option>
                                                        <option value="2xs-32-12">2xs-32-12</option>
                                                        <option value="1xs-34-14">1xs-34-14</option>
                                                        <option value="xs">xs</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                        <option value="XXXl">XXXl</option>
                                                     </select>
                                                </div>

                                            </div>


                                    


                                            <div class="col-4 col-sm-4">

                                                <div class="">
                                                    <label
                                                    class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                    >Amount </label>
                                                <input class="form-control" name="amount" type="text" />
                                                </div>
    
      
      
                                              </div>
      


                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">branch status</label>
                                                        <select class="form-select" name="branch_status"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="non">non</option>
                                                        <option value="ordered">ordered</option>
                                                        <option value="received">received</option>

                                                    </select>
                                                </div>

                                            </div>


                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-validation-gender">office status</label>
                                                        <select class="form-select" name="office_status"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="non">non</option>
                                                        <option value="received">received</option>
                                                        <option value="received">delivered</option>

                                                     </select>
                                                </div>

                                            </div>

                                            <div class="col-6 col-sm-4">

                                                <div class="">
                                                    <label
                                                        class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                                       >Payment Method </label>
                                                    <select class="form-select" name="p_method"
                                                        id="bootstrap-wizard-validation-gender">
                                                        <option value="card">Card</option>
                                                        <option value="cash">cash</option>
                                                        <option value="online">online</option>
                                                        


                                                    </select>
                                                </div>
  
                                            </div>


                                            

                                        </div>
                                 
 



                                        <div class="col-12 col-sm-12">

                                          <label
                                          class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                                          >Note </label>
                                      <input class="form-control" name="note" type="text" />


                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
</div>






 <div class="modal fade" id="details" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button></div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Update Student</h4>
         </div>
        <div class="p-4">
          <div class="row">
            <div class="card-body py-4">
                <form action="{{ route('student.update' , $registered->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="row">
                  

                      
                        <div class="col-6 col-sm-4">

                            <div class=""><label class="form-label"
                                    for="bootstrap-wizard-validation-gender">Branch</label>
                                <input type="text" class="form-control"
                                    placeholder="{{ $registered->branch_student->branch_name }}"
                                    disabled readonly>
                                <input type="hidden" name="branch_id"
                                    value="{{ $registered->branch_id }}">
                            </div>


                        </div>


                        <div class="col-6 col-sm-4">

                            <div class=""><label class="form-label"
                                    for="bootstrap-wizard-validation-gender">Academy</label>
                                <input type="text" class="form-control"
                                    placeholder="{{ $registered->academy_student->academy_name }}"
                                    disabled readonly>
                                <input type="hidden" name="academy_id"
                                    value="{{ $registered->academy_id }}">
                            </div>

                        </div>


                     



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>name :</strong>
                                <input type="text" name="name"
                                    class="form-control"   value="{{$registered->name}}">
                            </div>
                        </div>



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>birth date :</strong>
                                <input type="text" name="birth_date"
                                    class="form-control"
                                    value=" {{$registered->birth_date}}">
                            </div>
                        </div>




                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>phone :</strong>
                                <input type="text" name="phone"
                                    class="form-control" 
                                    value="{{$registered->phone}}">
                            </div>
                        </div>



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>email :</strong>
                                <input type="email" name="email"
                                    class="form-control" value="{{$registered->email}}">
                            </div>
                        </div>



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                            <div class="form-group">
                                <strong>registration date :</strong>
                                <input type="text" name="reg_date"
                                    class="form-control"
                                    placeholder="reg_date"
                                    value="{{$registered->reg_date}}">
                            </div>
                        </div>




                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">



                            <div class="form-group">
                                <strong>nationality :</strong>
                                <select name="nationality"
                                    class="form-control mb-1">
                                    <option value="">Select Country
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"  {{ old('nationality', $country) == $registered->nationality   ? 'selected' : '' }}>
                                            {{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>



                        <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">



                            <div class="form-group">
                                <strong>program :</strong>
                                <select name="programe_id"
                                    class="form-control mb-1">
                              
                                    @foreach ($allprograme as $x)
                                    @foreach ($x->program as $y)

                                    <option value="{{ $y->id }}" {{ old('programe_id', $y->id) ? 'selected' : '' }}>{{ $y->programe_name }}</option>

                                    @endforeach
                                    @endforeach

 
                                </select>
                            </div>



                        </div>




                        <div
                            class="col-xs-12 col-xl-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Address :</strong>
                                <input type="text" name="address"
                                    class="form-control"
                                    value="{{$registered->address}}">
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
<script>
    document.getElementById("mySelect").addEventListener("change", function() {
      if (this.value == "45639" || this.value == "45648" || this.value == "46230" ) {
        document.getElementById("myTextbox").style.display = "block";
      } else {
        document.getElementById("myTextbox").style.display = "none";
      }
    });
  </script>


 