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
                        <h5 class="fs-0 mb-10 mb-sm-0 text-primary">Student List</h5>
                    </div>

                    <div class="col col-lg-1">
                        <h5 class="fs-0 mb-3 mb-sm-0 text-primary">
                            <a href="{{ route('student.create') }}"> <button class="btn btn-falcon-primary me-1 mb-1"
                                    type="button">Add</button></a>
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

                    <div class=""><label class="form-label"
                            for="bootstrap-wizard-validation-gender">Branch</label><select class="form-select"
                            name="gender" id="bootstrap-wizard-validation-gender">
                            <option value="">Select student ...</option>
                            <option value="Male"> </option>
                        </select>
                    </div>


                </div>


                <div class="col-6 col-sm-4">

                    <div class=""><label class="form-label"
                            for="bootstrap-wizard-validation-gender">Academy</label><select class="form-select"
                            name="gender" id="bootstrap-wizard-validation-gender">
                            <option value="">Select student ...</option>
                            <option value="Male"> </option>
                        </select>
                    </div>


                </div>


                <div class="col-sm-4 mb-3"><label class="form-label" for="end-date">Search</label><input
                        class="form-control datetimepicker" id="end-date" type="text" /></div>


            </div>
        </form>
    </div>
</div>





<div class="card mb-3 scrollbar" id="customersTable"
    data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Student List</h5>
            </div>
            <div class="col-8 col-sm-auto text-end ps-2">
                <div class="d-none" id="table-customers-actions">
                    <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                        </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                </div>

            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive scrollbar">




               <table id="data-table" class="table table-bordered ">
        <thead>
            <tr>
                <th>No</th>
                <th>branch</th>

                <th>name</th>
                <th>email</th>
 
                 <th width="100px">Show</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
            </table>


        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center"><button
            class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
            data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
        <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button"
            title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
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

        
        ajax: "{{url('notactive')}}" +'/'+ {{$data['branch']}} + '/' + {{$data['academy']}}   ,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'branch_name', name: 'branch_name'},

            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>





@include('admin.layouts.footer')
