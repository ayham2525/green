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
                        @if (isset($amount))
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">uniform Report /  Total Income  : <b>{{$amount}}</b>  </h5> 

                        @else
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">uniform Report   </h5> 

                        @endif

                    
 
                        
                       
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card-body">
   <div class="col-lg-12">
    <form action="{{ url('uniformincom') }}" method="POST" >
        @csrf
        <div class="row">
            <div class="col-lg-3">
                <label class="form-label" for="exampleFormControlInput1">Branch</label>

                <select name="branch_id" id="branch_id" class="form-select"  >
					                    <option value="">Select Branch</option>

                    @foreach ($branch as $item)
                    @if (((auth()->user()->admin_type == 'branch_admin') || (auth()->user()->admin_type == 'academy_admin')) && (auth()->user()->branch_id == $item->id)  )

                        
                     <option value="{{$item->id}}">{{$item->branch_name}}</option>
					
							@elseif((auth()->user()->admin_type == 'full_admin'))
					
				   <option value="{{$item->id}}">{{$item->branch_name}}</option>
					
                     @endif

                     @endforeach

                    </select>
            </div>


            <div class="col-lg-3">
                <label class="form-label" for="exampleFormControlInput1">Academy</label>

                <select name="academy_id" id="academy_id"  class="form-select">
                    <option value="">Select academy</option>

                 </select>
            </div>



            <div class="col-lg-2">
                <label class="form-label" for="exampleFormControlInput1">From</label>
                    <input name="from_date" class="form-control" id="exampleFormControlInput1" type="date"   />
                
            </div>


            <div class="col-lg-2">
                <label class="form-label" for="exampleFormControlInput1">To</label>
                    <input name="to_date" class="form-control" id="exampleFormControlInput1" type="date"  />
                
            </div>



            <div class="col-lg-2">
                 <button style="margin-top:2.2rem"   type="submit">send</button>

                
            </div>







        </div>
        
    </form>
   </div>
  </div>
  <button class="mt-2" id="btn-export"><b>Export as XLSX</b></button>


  <div class="card-body mt-4" >
    <div class="table-responsive">
        @if (isset($details))
        <table  id="my-table" class="  table-bordered   fs--1 mb-0 table table-sm table-striped overflow-hidde text-center">
 
            <thead style="background-color: #df1a23 ; color:#fff">
                    <tr>
                        <th scope="col">id</th>

                        <th scope="col">registerd_id</th>
                        <th scope="col">name</th>
                        <th scope="col">branch</th>
                        <th scope="col">academy</th>
                        <th scope="col">order D</th>
                        <th scope="col">size</th>

              
                        <th scope="col">amount</th>


                        <th scope="col">payment method</th>
                        <th scope="col">Note</th>

          
     

                    </tr>
                </thead>
                <tbody>
              
                    <?php $i = 0 ; ?>

                    @foreach ($details as $invoice)
                    <?php $i++?>
                
                        <tr>
                            <td>{{$i}}</td>

                            <td>{{$invoice->registerd_id}}</td>
                            <td>{{$invoice->name}}</td>
                            <td>{{$invoice->branch_name}}</td>
                            <td>{{$invoice->academy_name}}</td>
                            <td>{{$invoice->order_date}}</td>
                            <td>{{$invoice->size}}</td>

                            <td>{{$invoice->amount}}</td>
                            <td>{{$invoice->p_method}}</td>
	                            <td>{{$invoice->note}}</td>



              
               

                         </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>

  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#branch_id').on('change', function() {
              var branchID = $(this).val();
              if(branchID) {
                  $.ajax({
                      url: 'get_academy/'+encodeURI(branchID),
                      type: "GET",
                      dataType: "json",
                      success:function(data) {
                          $('select[name="academy_id"]').empty();
                          $.each(data.academy, function(key, value) {
                              $('select[name="academy_id"]').append('<option value="'+ value.id +'">'+ value.academy_name +'</option>');
                          });
                      }
                  });
              } else {  
                  $('select[name="academy_id"]').empty();
              }
          });
      });


      const exportButton = document.getElementById('btn-export');

const table = document.getElementById('my-table');

exportButton.addEventListener('click', () => {
  /* Create worksheet from HTML DOM TABLE */
  const wb = XLSX.utils.table_to_book(table, {sheet: 'sheet-1'});

  /* Export to file (start a download) */
  XLSX.writeFile(wb, 'MyTable.xlsx');
});


      </script>  



<!-- Internal Data tables -->
 
   
 

<script src="{{ url('vendors') }}/xlsx.full.min.js"></script>

<script src="{{ url('vendors') }}/jquery/jquery.min.js"></script>
<script src="{{ url('vendors') }}/datatables.net/jquery.dataTables.min.js"></script>
<script src="{{ url('vendors') }}/datatables.net-bs5/dataTables.bootstrap5.min.js"></script>
<script src="{{ url('vendors') }}/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>
<script src="{{ url('vendors') }}/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css"></script>

 

 

 
 


@include('admin.layouts.footer')

 