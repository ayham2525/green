@include('admin.layouts.header')
@include('admin.layouts.nav')


 <style>
 
 
 

th,
td {
  overflow: hidden;
  white-space: nowrap;
}
 


 
 .autoSize {
    white-space: nowrap;
    width: 1%;
 }
 

 /* DEMO 01 */
.pricing-table-3{
  background-color:#FFF;
  margin:15px auto;
  box-shadow:0px 0px 25px rgba(0,0,0,0.1);
   border-radius:0px 10px 0px 10px;
  overflow:hidden;
  position:relative;
  min-height:250px;
  transition:all ease-in-out 0.25s;
}
 

.pricing-table-3.basic .price{
  background-color:#28b6f6;
  color:#FFF;
}
.pricing-table-3.premium .price{
  background-color:#ff9f00;
  color:#FFF;
}
.pricing-table-3.business .price{
  background-color:#df1a23;
  color:#FFF;
}

.pricing-table-3 .pricing-table-header{
  background-color:#212121;
  color:#FFF;
  padding:20px 0px 0px 20px;
  position:absolute;
  z-index:5;
}
.pricing-table-3 .pricing-table-header p{
  font-size:12px;
  opacity:0.7;
}
.pricing-table-3 .pricing-table-header::before{
  content:"";
  position:absolute;
  left:-50px;
  right:-180px;
  height:125px;
  top:-50px;
  background-color:#212121;
  z-index:-1;
  transform:rotate(-20deg)
}

.pricing-table-3 .price{
  position:absolute;
  top:0px;
  text-align:right;
  padding:100px 50px 0px 0px;
  
  
  right:0px;
  left:0px;
  font-size:20px;
  z-index:4;
}
.pricing-table-3 .price::before{
  content:"";
  position:absolute;س
  left:0px;
  right:0px;
  height:100px;
  bottom:-50px;
  background-color:inherit;
  transform:skewY(10deg);
  z-index:-1;
  box-shadow:0px 5px 0px 5px rgba(0,0,0,0.05);
}


.pricing-table-3 .pricing-body{
  padding:20px;
  padding-top:200px;  
}
.pricing-table-3 .pricing-table-ul li{
  color:rgba(0,0,0,0.7);
  font-size:12px;
  padding:10px;

  border-bottom:1px solid rgba(0,0,0,0.1);
}
.pricing-table-3 .pricing-table-ul .fa{
  margin-right:10px;
}
.pricing-table-3.basic .pricing-table-ul .fa{
  color:#28b6f6;
}
.pricing-table-3.premium .pricing-table-ul .fa{
  color:#ff9f00;
}
.pricing-table-3.business .pricing-table-ul .fa{
  color:#c3185c;
}
.pricing-table-3 .view-more{
  margin:10px 20px;
  display:block;
  text-align:center;
  background-color:#212121;
  padding:10px 0px;
  color:#FFF;
} 
	 
.test
	 {
		 width : 100% !important ;
	 }
 </style>

<div class="row g-3 mb-3">

    <div class="col-xxl-12 col-lg-12 ">
        <div class="card bg-light my-3 mt-4">
            <div class="card-body p-3 ">
                <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item "  > <a href="{{url('branch')}}/{{$academy->branche->id}}">{{ $academy->branche->branch_name }}</a></li>

                      <li class="breadcrumb-item active" aria-current="page">{{ $academy->academy_name }}</li>

                    </ol>
                  </nav>
            </div>
        </div>


      

    </div>

</div>



<div class="row g-3 mb-3">

    <div class="col-xxl-9">



        <div class="row g-3 mb-3">
            <div class="col-sm-6 col-md-6 col-lg-6 col-l-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                        style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h6>Active User<span class="badge badge-soft-info rounded-pill ms-2">this month</span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                            data-countup='{"endValue":{{$active}}}'>0</div><a
                            class="fw-semi-bold fs--1 text-nowrap" href="{{url('student')}}/{{$academy->branch_id}}/{{$academy->id}}">See all<span
                                class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-l-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                        style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h6>Disactive User<span class="badge badge-soft-info rounded-pill ms-2">this month</span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-danger"
                        data-countup='{"endValue":{{$expired}}}'>0</div><a
                        class="fw-semi-bold fs--1 text-nowrap" href=" ">See
                            all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
        
        </div>




    </div>

</div>





<div class="card mb-3">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-sm-auto mb-2 mb-sm-0">
                <h5 class="mb-0 text-danger">Academy Programe</h5>
            </div>

        </div>
    </div>
</div>


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach
@endif


@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif


 
         <div class="card h-100">
            <ul class="nav nav-tabs" id="myTab" role="tablist">

            <div class="col-lg-4">
                <li class="nav-item" style="background-color: #df1a23 ;color:#FFF" ><a style=" color:#FFF" class="nav-link active text-center" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">Programe</a></li>
            </div>

            <div class="col-lg-4">
                <li class="nav-item" style="background-color: #212121 ;color:#FFF"><a style=" color:#FFF" class="nav-link text-center" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Student</a></li>
            </div>


            <div class="col-lg-4">
                <li class="nav-item" style="background-color: #df1a23 ;color:#FFF" ><a style=" color:#FFF" class="nav-link  text-center" id="pay-tab" data-bs-toggle="tab" href="#tab-pay" role="tab" aria-controls="tab-pay" aria-selected="true">witout payment</a></li>
            </div>


               </ul>
              <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                    
                    <div class="card-body ">
                        <div class="row">
                            @foreach ($academy_program->program as $x)
            
            
                            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                                <div class="pricing-table-3 business ">
                                    <div class="pricing-table-header">
                                    </div>
                                    <div style="font-weight: bold;padding-bottom:1.5rem"  class="mb-5 price text-center ">{{$x->programe_name}} </div>
                                    <div class="pricing-body ">
                                        <ul class="pricing-table-ul">
                                            <li><i class="fa  fas fa-bookmark"></i> Class :  {{$x->classes}}  </li>
            
                                            <li><i class="fa  fa-credit-card"></i> Price :  {{$x->price}} AED</li>
                                            <li><i class="fa  fas fa-calendar"></i> Days : {{$x->days}} </li>
            
            
                                           </ul>
                                           
                                           <a href="#pro{{ $x->id }}" data-bs-toggle="modal" class="view-more">Add</a>
            
               
                                        </div>
                                </div>
                            </div>
            
            
            
            
                                <div class="modal fade" id="pro{{ $x->id }}" data-bs-keyboard="false"
                                    data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl mt-6" role="document">
                                        <div class="modal-content border-0">
                                            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1"><button
                                                    class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                    data-bs-dismiss="modal" aria-label="Close"></button></div>
                                            <div class="modal-body p-0">
            
                                                <div class="card theme-wizard  ">
                                                    <div class="card-header bg-light pt-3  ">
                                                  
                                                    </div>
                                                    <div class="card-body py-4">
                                                        <form action="{{ route('student.store') }}" method="POST">
                                                            @csrf
            
                                                            <div class="row">
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>Branch :</strong>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $academy->branche->branch_name }}"
                                                                            disabled readonly>
                                                                        <input type="hidden" name="branch_id"
                                                                            value="{{ $academy->branche->id }}">
            
                                                                    </div>
                                                                </div>
            
            
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>Academy :</strong>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $academy->academy_name }}"
                                                                            disabled readonly>
            
                                                                        <input type="hidden" name="academy_id"
                                                                            value="{{ $academy->id }}">
            
                                                                    </div>
                                                                </div>
            
            
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4">
                                                                    <div class="form-group">
                                                                        <strong>Program :</strong>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $x->programe_name }}"
                                                                            disabled readonly>
            
                                                                        <input type="hidden" name="programe_id"
                                                                            value="{{ $x->id }}">
            
                                                                    </div>
                                                                </div>
            
            
            
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                    <div class="form-group">
                                                                        <strong>name :</strong>
                                                                        <input type="text" name="name"
                                                                            class="form-control" placeholder="name">
                                                                    </div>
                                                                </div>
            
            
            
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                    <div class="form-group">
                                                                        <strong>birth date :</strong>
                                                                        <input type="date" name="birth_date"
                                                                            class="form-control"
                                                                            placeholder="birth date">
                                                                    </div>
                                                                </div>
            
            
            
            
                                                                <div class="col-xs-4 col-xl-4 col-sm-4 col-md-4 mt-2">
                                                                    <div class="form-group">
                                                                        <strong>phone :</strong>
                                                                        <input type="text" name="phone"
                                                                            class="form-control" placeholder="phone"
                                                                            value="+971">
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
                                                                        <strong>registration date :</strong>
                                                                        <input type="date" name="reg_date"
                                                                            class="form-control"
                                                                            placeholder="reg_date"
                                                                            value="{{ date('Y-m-d') }}">
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
                                                                                <option value="{{ $country }}">
                                                                                    {{ $country }}</option>
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
                                                                            placeholder="address">
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
            
                                <!-------------------------------------------------------------------------------------------------------------------------------->
                            @endforeach
            
                        </div>
                     
                    </div>
            
                
                
                
                
                </div>
  
                <div class="tab-pane " id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
 
                    <div class="table-responsive scrollbar">
                        <table id="data-table" class="table test table-bordered  fs--1 mb-0 table table-sm table-striped overflow-hidde text-center">
                            <thead style="background-color: #df1a23 ; color:#fff">
                              <tr style="font-weight: bold">
                                <th class="col" style="width:20px">No</th>
                                <th class="col">ID</th>

                                <th class="col">name</th>
								            <th scope="col">age</th>

                                <th class="col">academy </th>
                                 <th class="col">reg_date</th>

                  
                          
                      
                                <th class="col">email</th>
                                <th class="col">phone</th>
                                <th class="col">start Date</th>
                                <th class="col">end date</th>
                      
                                <th class="col">status</th>
                      
                       
                       
                                <th class="col">show</th>
                               </tr>
                            </thead>
                      
                          </table>
                        
                    </div>
                 </div>

                <div class="tab-pane fade" id="tab-pay" role="tabpanel" aria-labelledby="pay-tab">
                <div class="col-lg-12 col-xl-12 ">
                    <div class="table-responsive scrollbar">
                        <table style="color: #000" id="tableExample3" class="table table-bordered  fs--1 mb-0 table table-sm table-striped overflow-hidde text-center">
                            <thead style="background-color: #df1a23 ; color:#fff">
                              <tr style="font-weight: bold">
                        
                                <th scope="col">reg_id</th>

                                <th scope="col">name</th>
                                <th scope="col">programe_name</th>
                                <th scope="col">age</th>



                    
                          
                      
                                <th scope="col">birth_date</th>
                                <th scope="col">phone</th>
           
                                <th scope="col">reg_date</th>

                       
                                <th scope="col">show</th>
                               </tr>

                               <tbody>
                                @foreach($nopay as $x)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->name}}</td>
                                    <td>{{$x->programe_name}}</td>
                                    <td>{{\Carbon\Carbon::parse($x->birth_date)->age}}</td>


                                    <td>{{$x->birth_date}}</td>
                                    <td>{{$x->phone}}</td>
                                    <td>{{$x->reg_date}}</td>

                                    <td class="text-end">
                                        <div>
                                            <a href="{{route('student.show' , $x->id)}}"><span class=" fas fa-edit"></span></a>
                                    
                                            </div>
                                      </td>
                                  
                           
                                    


                                  </tr>
                                  @endforeach
                 

                                
                              </tbody>
                              
                            </thead>
                      
                          </table>
                      </div>
                    </div>
                 </div>

               </div>
            

        </div>

    
    

 
 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
       
<script type="text/javascript">
    $(function () {
        var table = $('#data-table').DataTable({
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
            dom: 'lBfrtip',
            buttons: [{
                extend: 'excelHtml5',
                sheetName: 'Exported data',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            }],
            processing: true,
            serverSide: true,
            ajax: "{{url('academy')}}" + '/' + {{$data['academy']}},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'registerd_id', name: 'registerd_id'},
                {data: 'name', name: 'name'},
                {data: 'birth_date', name: 'birth_date'},
                {data: 'academy_name', name: 'academy_name'},
                {data: 'reg_date', name: 'reg_date'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'statues', name: 'statues'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            'rowCallback': function (row, data, index) {
                if (data['statues'] === 'expired') {
                    $(row).find('td:eq(10)').css({"font-weight": "bold", "color": "red"});
                    $(row).find('td:eq(9)').css({"font-weight": "bold", "color": "red"}); // تلوين تاريخ النهاية
                } else if (data['statues'] === 'active') {
                    $(row).find('td:eq(10)').css({"font-weight": "bold", "color": "green"});
                    $(row).find('td:eq(9)').css({"font-weight": "bold", "color": "green"}); // تلوين تاريخ النهاية
                }
            }
        });
    });
</script>

          
       
  


@include('admin.layouts.footer')
