@include('admin.layouts.header')
@include('admin.layouts.nav')

 

<div class="card mb-3">
    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-5.png);"></div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <div class="row g-2 align-items-sm-center">
        <div class="col-auto"><img src="../assets/img/icons/connect-circle.png" alt="" height="20" /></div>
        <div class="col">
          <div class="row align-items-center">
            <div class="col col-lg-8">
              <h5 class="fs-0 mb-3 mb-sm-0 text-primary">Sport List</h5>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
 


<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div> <!--/.bg-holder-->
    <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-12">

            <table class="table mb-0 data-table fs--1">
                <thead class="bg-200 text-900">
                  <tr>
                    <th class="sort">id</th>
                    <th class="sort">image </th>
                    <th class="sort">Branch</th>
                    <th class="sort">Action</th>

                     </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle subject py-2 pe-4 fw-semi-bold">1</td>


                    
                    <td class="align-middle client white-space-nowrap pe-3 pe-xxl-4 ps-2">
                        <div class="d-flex align-items-center gap-2 position-relative">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../../assets/img/team/14-thumb.png" alt="" />
                          </div>
                         </div>
                      </td>


               <td class="align-middle subject py-2 pe-4 fw-semi-bold">Regarding Falcon Theme #3262</td>


                      <td class=" ">
                       <a style="margin-right: 12px ; font-size:18px" href="" > <h4 class="badge  rounded badge-soft-success false">Edit</h4></a>
                       <a style="margin-right: 12px ; font-size:18px" href="" > <h4 class="badge  rounded badge-soft-danger false">Delete</h4></a>
                    </td>

                     </tr>
             
                </tbody>
         
         </div>
      </div>
    </div>
  </div>



@include('admin.layouts.footer')

 