@include('admin.layouts.header')
@include('admin.layouts.nav')




<div class="card mb-3 scrollbar">
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Student List</h5>
            </div>
     
        </div>
    </div>



   <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <table id="data-table" class="table table-bordered  fs--1 mb-0 table table-sm table-striped overflow-hidde text-center">
 
      <thead style="background-color: #df1a23 ; color:#fff">
                <tr style="font-weight: bold">
              <th scope="col">id</th>
              <th scope="col">registerd_id</th>

              <th scope="col">name</th>
              <th scope="col">branch name</th>
              <th scope="col">academy name</th>
              <th scope="col">size</th>
              <th scope="col">order date</th>
              <th scope="col">amount</th>
              <th scope="col">branch status</th>
              <th scope="col">office status</th>
  
        
    
               <th scope="col">phone</th>
      
     
     
     
              <th scope="col">show</th>
             </tr>
          </thead>
   
        </table>
      </table>
    </div>
 
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


 

 

<script type="text/javascript">
    $(function () {
      
      var table = $('#data-table').DataTable({
          processing: true,
          serverSide: true,
  
          
          ajax: "{{url('uniform')}}"  ,
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'registerd_id', name: 'registerd_id'},

              {data: 'name', name: 'name'},
  
              {data: 'branch_name', name: 'branch_name'},
              {data: 'academy_name', name: 'academy_name'},
              {data: 'size', name: 'size'},
              {data: 'order_date', name: 'order_date'},
              {data: 'amount', name: 'amount'},
              {data: 'branch_status', name: 'branch_status'},
              {data: 'office_status', name: 'office_status'},
 
    
   
               {data: 'phone', name: 'phone'},
 
  
  
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>





@include('admin.layouts.footer')
 
