@include('admin.layouts.header')
<?php use Carbon\Carbon;

?>





<div class="row g-3 mb-3">



    <div class="col-xxl-12 col-lg-12 ">
        <div class="card bg-light my-3 mt-4">
            <div class="card-body p-3 ">
                <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "> {{ $registered->branch_student->branch_name }}</li>
                        <li class="breadcrumb-item "> {{ $registered->academy_student->academy_name }}</li>
                        <li class="breadcrumb-item">{{ $registered->name }}</li>


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
                    <div class=" text-center">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($registered->id)) !!} ">
                     </div>
        
                </div>
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

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">Student Status : </p>
                <b>
                    <p class="fs--1 mb-0 text-600">Active </p>
                </b>
            </div>

            <div class="flex-1">
                <p class="mb-0">Student was created</p>
                <p class="fs--1 mb-0 text-600">{{ $registered->created_at }}</p>
            </div>


            <div>




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
                             <th   data-sort="age">Payment Method</th>
 
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($registered->payment_student  as $x)
                            
                        <tr>
                             <td>{{$x->id}}</td>
                             <td>{{$x->amount}}AED</td>
                             <td>{{$x->payment_date}}</td>
                             <td>{{$x->start_date}}</td>
                             <td>{{$x->end_date}}</td>
                             <td>{{$x->discount}}</td>
                              <td>{{$x->pay_method}}</td>
                      

 
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


@include('admin.layouts.footer')
