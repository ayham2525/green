@include('admin.layouts.header')
@include('admin.layouts.nav')

<style>
 

th,
td {
  overflow: hidden;
  white-space: nowrap;
}
</style>





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
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">
                           Student |  Card :  <span style="color: black">{{$card}}</span>
                              -   Cash :  <span style="color: black">{{$cash}}</span> 
                               -  online :  <span style="color: black">{{$online}}</span> 
                                -      Income  : <span style="color: red">{{$amount}}</span> 
                                   </h5> 

                              <hr>

                                  <h5 class="fs-0 mb-10 mb-sm-0 text-primary">
                                    uniform |  Card :  <span style="color: black">{{$uniform_incom_card}}</span>
                                     -     Cash :  <span style="color: black">{{$uniform_incom_cash}}</span> 
                                      -    online :  <span style="color: black">{{$uniform_incom_online}}</span> 
                                      -      Income  : <span style="color: red">{{$uniform_incom}}</span>
                                      <hr>


                                    Total Income Student & Uniform : <span style="color: red">{{$uniform_incom + $amount }}</span>

                                            </h5> 



 
                        @else
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Financial Report   </h5> 

                        @endif

                    
 
                        
                       
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>



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
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary"> NEW <span style="color: #df1a23">{{$new}}</span>  -  RENEWAL <span style="color: #df1a23">{{$renwal}}</span>   </h5> 
 
                        @else
 
                        @endif

                    
 
                        
                       
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card-body">
   <div class="col-lg-12">
    <form action="{{ url('totalincome') }}" method="POST" >
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
                        <th style="font-weight: bold;
" scope="col">id</th>

                        <th scope="col">registerd_id</th>
                        <th scope="col">name</th>
                        <th scope="col">branch</th>
                        <th scope="col">academy</th>
                        <th scope="col">payment D</th>
              
                        <th scope="col">amount</th>

                        <th scope="col">payment method</th>
              			   <th scope="col">reset_num</th>

                        <th scope="col">start date</th>
                        <th scope="col">end date</th>
                        <th scope="col">new / renewal</th>
                        <th scope="col">status</th>
     

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
                            <td>{{$invoice->payment_date}}</td>
                            <td>{{$invoice->amount}}</td>
                            <td>{{$invoice->pay_method}}</td>
							 <td>{{$invoice->still}}</td>

                            <td>{{$invoice->start_date}}</td>
                            <td>{{$invoice->end_date}}</td>
						 <td>{{$invoice->status_student}}</td>

                            <td>{{$invoice->statues}}</td>

              
               

                         </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>

 


  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>


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
 
   
 
 

 

 
 


@include('admin.layouts.footer')

 