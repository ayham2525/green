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
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Payment List</h5>
                    </div>

                    <div class="col col-lg-1">
                        <h5 class="fs-0 mb-3 mb-sm-0 text-primary">
                             <a href="{{route('payment.create')}}"><button class="btn btn-falcon-primary me-1 mb-1"  
                                data-bs-target="#staticBackdrop">Add</button></a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card mb-3">
   
  <div class="card-body bg-light">
    <form>
      <div class="row gx-2">

        <div class="col-6 col-sm-4">

          <div class=""><label class="form-label" for="bootstrap-wizard-validation-gender">Branch</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
            <option value="">Select student ...</option>
            <option value="Male"> </option>
            </select>
          </div>


         </div>


         <div class="col-6 col-sm-4">

          <div class=""><label class="form-label" for="bootstrap-wizard-validation-gender">Academy</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
            <option value="">Select student ...</option>
            <option value="Male"> </option>
            </select>
          </div>


         </div>


          <div class="col-sm-4 mb-3"><label class="form-label" for="end-date">Search</label><input class="form-control datetimepicker" id="end-date" type="text"  /></div>
    
     
            </div>
    </form>
  </div>
</div>





<div class="card mb-3">
  <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <table id="data-table" class="table table-bordered  fs--1 mb-0 table table-sm table-striped overflow-hidde text-center">
 
      <thead style="background-color: #df1a23 ; color:#fff">
        <tr>
          <th scope="col">id</th>

          <th scope="col">registerd_id</th>
          <th scope="col">name</th>
          <th scope="col">branch</th>
          <th scope="col">academy</th>
          <th scope="col">payment D</th>

          <th scope="col">amount</th>
          <th scope="col">payment method</th>

          <th scope="col">start date</th>
          <th scope="col">end date</th>

  
          <th scope="col">status</th>

 
 
          <th scope="col">show</th>
         </tr>
      </thead>

    </table>
    </table>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
 $(function () {
   
   var table = $('#data-table').DataTable({
       processing: true,
       serverSide: true,

       
       ajax: "{{url('payment')}}" ,
       columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           {data: 'registerd_id', name: 'registerd_id'},

           {data: 'name', name: 'name'},
           {data: 'branch_name', name: 'branch_name'},
           {data: 'academy_name', name: 'academy_name'},
           {data: 'payment_date', name: 'payment_date'},


           {data: 'amount', name: 'amount'},
           {data: 'pay_method', name: 'pay_method'},

           {data: 'start_date', name: 'start_date'},
           {data: 'end_date', name: 'end_date'},



              
           {data: 'statues', name: 'statues'},


           {data: 'action', name: 'action', orderable: false, searchable: false},
       ] ,
	   
	       'rowCallback': function(row, data, index){
    if(data['statues'] === 'expired'){
        $(row).find('td:eq(10)').css("font-weight", "bold"  );
        $(row).find('td:eq(10)').css("color", "red"  );
    }
    else if(data['statues'] === 'active')
    {
        $(row).find('td:eq(10)').css("font-weight", "bold"  );
        $(row).find('td:eq(10)').css("color", "green"  );
    }
    
  }

   });
   
 });
</script>







 

@include('admin.layouts.footer')