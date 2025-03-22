@include('admin.layouts.header')
@include('admin.layouts.nav')


<style>
 

th,
td {
  overflow: hidden;
  white-space: nowrap;
}
</style>


 


<div class="row g-3 mb-3">

    <div class="col-xxl-12 col-lg-12 ">
        <div class="card bg-light my-3 mt-4">
            <div class="card-body p-3 ">
                <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $branches->branch_name }}</li>
                    </ol>
                  </nav>
            </div>
        </div>


      

    </div>

</div>




<div class="row col-xxl-12 col-lg-12">


    @foreach ($branches->academy as $x)
    @if ((auth()->user()->admin_type == 'academy_admin')   &&  (auth()->user()->academy_id ==  $x->id) )


 
    <div class="col-lg-4 col-xl-4 mt-2 mb-4">
        <div class="card">
      <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <a href="{{ url('academy') }}/{{ $x->id }}">

        <h5 class="text-danger">{{ $x->academy_name }}</h5>
    </a>
       </div>
    </div>
  </div>

      @elseif((auth()->user()->admin_type == 'branch_admin'))
            
      <div class="col-lg-4 col-xl-4 mt-2 mb-4">
        <div class="card">
      <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <a href="{{ url('academy') }}/{{ $x->id }}">

        <h5 class="text-danger">{{ $x->academy_name }}</h5>
    </a>
       </div>
    </div>
  </div>


  @elseif((auth()->user()->admin_type == 'full_admin'))


  <div class="col-lg-4 col-xl-4 mt-2 mb-4">
    <div class="card">
  <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);"></div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <a href="{{ url('academy') }}/{{ $x->id }}">

    <h5 class="text-danger">{{ $x->academy_name }}</h5>
</a>
   </div>
</div>
</div>



  @endif

      @endforeach


</div>

@if((auth()->user()->admin_type == 'admin_branch')  || (auth()->user()->admin_type == 'full_admin') )

<div class="row">
    <div class="col-xxl-12 col-lg-12">


     

    </div>



<div class="card mb-3 scrollbar">
<div class="card-header">
    <div class="row flex-between-center">
        <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
            <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Student List</h5>
        </div>
 
    </div>
</div>
<div class="table-responsive scrollbar">
    <table style="color: black" id="data-table" class="table table-bordered  fs--1 mb-0 table table-sm table-striped overflow-hidden text-center">
        <thead style="background-color: #df1a23 ; color:#fff">
            <tr style="font-weight: bold">
          <th scope="col">NO</th>
          <th scope="col">ID</th>

          <th scope="col">name</th>
          <th scope="col">age</th>
          <th scope="col">phone</th>
          <th scope="col">email</th>
          <th scope="col">academy</th>
          <th scope="col">reg_date</th>

 
          <th scope="col">start Date</th>
          <th scope="col">end date</th>

          <th scope="col">amount</th>

          <th scope="col">status</th>

 
 
          <th scope="col">show</th>
         </tr>
      </thead>

    </table>
  </div>
 
</div>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
  $(function () {
    
    var table = $('#data-table').DataTable({
		
		                "lengthMenu": [[ 25, 50, 100 ,  -1], [ 25, 50, 100 , "All"]] , 

		
		 dom: 'lBfrtip',
	 
  

                 
       buttons: [ {
            extend: 'excelHtml5',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ,6 ,7 ,8 ,9 ,10 ]
                }
        } ] ,
        
        
		
        processing: true,
        serverSide: true,

        
        ajax: "{{url('branch')}}" + '/'+ {{$data['branch']}} ,
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'registerd_id', name: 'registerd_id'},

            {data: 'name', name: 'name'},
            {data: 'birth_date', name: 'birth_date'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},




            {data: 'academy_name', name: 'academy_name'},
            {data: 'reg_date', name: 'reg_date'},
 
 
 

            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'amount', name: 'amount'},

    
            {data: 'statues', name: 'statues'},


            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

        'rowCallback': function(row, data, index){
    if(data['statues'] === 'expired'){
        $(row).find('td:eq(11)').css("font-weight", "bold"  );
        $(row).find('td:eq(11)').css("color", "red"  );
    }
    else if(data['statues'] === 'active')
    {
        $(row).find('td:eq(11)').css("font-weight", "bold"  );
        $(row).find('td:eq(11)').css("color", "green"  );
    }
    
  }


 

    });
    
  });
</script>


 

@elseif((auth()->user()->admin_type == 'admin_academy'))


@endif


@include('admin.layouts.footer')
