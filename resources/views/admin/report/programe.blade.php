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
              
                    
 
                        
                       
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card-body">
   <div class="col-lg-12">
    <form action="{{ url('programreport') }}" method="POST" >
        @csrf
        <div class="row">
            <div class="col-lg-2">
                <label class="form-label" for="exampleFormControlInput1">Branch</label>

                <select name="branch" id="branch" class="form-select"  >
                    <option value="">select branch</option>

                    @foreach ($branch as $x)
                        
               <option value="{{$x->id}}">{{$x->branch_name}}</option>

					
               @endforeach
  
                    </select>
            </div>


            <div class="col-lg-3">
                <label class="form-label" for="exampleFormControlInput1">Academy</label>

                <select name="academy" id="academy"  class="form-select">
                    <option value="">Select academy</option>

                 </select>
            </div>


            <div class="col-lg-3">
                <label class="form-label" for="exampleFormControlInput1">Program</label>

                <select name="program" id="program"  class="form-select">
                    <option value="">Select program</option>

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
                        <th scope="col">programe_name</th>

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

                    @foreach ($registered as $x)
                    <?php $i++?>
                
                        <tr>
                            <td>{{$i}}</td>

                            <td>{{$x->registerd_id}}</td>
                            <td>{{$x->name}}</td>
                            <td>{{$x->branch_name}}</td>
                            <td>{{$x->academy_name}}</td>
                            <td>{{$x->programe_name}}</td>

                            <td>{{$x->payment_date}}</td>
                            <td>{{$x->amount}}</td>
                            <td>{{$x->pay_method}}</td>
							 <td>{{$x->still}}</td>

                            <td>{{$x->start_date}}</td>
                            <td>{{$x->end_date}}</td>
						 <td>{{$x->status_student}}</td>

                            <td>{{$x->statues}}</td>

              
               

                         </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>

 



  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>


 

  <script>
    $(document).ready(function() {
        // Fetch the subcategories by category
        $('#branch').on('change', function() {
            var branchID = $(this).val();
            if(branchID) {
                $.ajax({
                    url: 'get-academy/'+branchID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        if(data){
                            $("#academy").empty();
                            $("#academy").append('<option value="">--Select Academy--</option>');
                            $.each(data, function(key, value){
                                $("#academy").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#academy").empty();
                        }
                    }
                });
            }else{
                $("#academy").empty();
                $("#program").empty();
            }
        });
    
        // Fetch the products by subcategory
        $('#academy').on('change', function() {
            var academyID = $(this).val();
            if(academyID) {
                $.ajax({
                    url: 'get-program/'+academyID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        if(data){
                            $("#program").empty();
                            $("#program").append('<option value="">--Select program--</option>');
                            $.each(data, function(key, value){
                                $("#program").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }else{
                            $("#program").empty();
                        }
                    }
                });
            }else{
                $("#program").empty();
            }
        });
    });
    </script>



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



 
   
 
 

 

 
 


@include('admin.layouts.footer')

 