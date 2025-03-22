@include('admin.layouts.header')
@include('admin.layouts.nav')

<div class="col-lg-6 col-xl-12 col-xxl-6 h-100">
    <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i></span>
      <div class="col">
        <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Student Information</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
       </div>
    </div>
    <div class="card theme-wizard h-100 mb-5">
      <div class="card-header bg-light pt-3 pb-2">
        <ul class="nav justify-content-between nav-wizard">
          <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Personal</span></a></li>
          <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Personal</span></a></li>
          <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Academy</span></a></li>
          <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
        </ul>
      </div>
      <div class="card-body py-4" id="wizard-controller">
        <div class="tab-content">
          <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
            <form class="needs-validation" novalidate="novalidate">
       
       
              <div class="row g-2">
                <div class="col-6">
              <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-email">Name*</label>
                <input class="form-control" type="Name" name="Name" placeholder="Name"  required="required" id="bootstrap-wizard-validation-wizard-txt"   />
                <div class="invalid-feedback">You must add Name</div>
              </div>
                </div>


                <div class="col-6">
                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-email">Email*</label>
                    <input class="form-control" type="email" name="email" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true" />
                    <div class="invalid-feedback">You must add email</div>
                  </div>
                    </div>
                </div>



              <div class="row g-2">
                <div class="col-6">
                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-name">Date Of birth*</label><input class="form-control" type="date" name="date" placeholder="date" required="required" id="bootstrap-wizard-validation-wizard-date"  />
                    <div class="invalid-feedback">Date Of birth</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-name">Address*</label><input class="form-control" type="text" name="confirmPassword" placeholder="Address" required="required" id="bootstrap-wizard-validation-wizard-confirm-password" />
                    <div class="invalid-feedback">You must add Address</div> 
                  </div>
                </div>
              </div>




              
              <div class="row g-2">
                <div class="col-6">
                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-name">Phone Number*</label><input class="form-control" type="text" name="password" placeholder="Password" required="required" id="bootstrap-wizard-validation-wizard-password" data-wizard-validate-password="true" />
                    <div class="invalid-feedback">Phone Number</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-wizard-name">Nationality*</label><input class="form-control" type="text" name="Nationality" placeholder="Nationality" required="required" id="bootstrap-wizard-validation-wizard-confirm-password" data-wizard-validate-confirm-password="true" />
                    <div class="invalid-feedback">Nationality</div> 
                  </div>
                </div>
              </div>




              <div class="form-check"><input class="form-check-input" type="checkbox" name="terms" required="required" checked="checked" id="bootstrap-wizard-validation-wizard-checkbox" /><label class="form-check-label" for="bootstrap-wizard-validation-wizard-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div>
            </form>
          </div>



          <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
          
              <div class="mb-3">
                <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"avatar.png","size":"54kb","url":"../../assets/img/team"}]}'>
                  <div class="fallback"><input type="file" name="file" /></div>
                  <div class="col-md-auto">
                    <div class="dz-preview dz-preview-single">
                      <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                        <div class="avatar avatar-4xl"><img class="rounded-circle" src="../../assets/img/team/avatar.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                      <div class="text-center"><img class="me-2" src="../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Upload your profile picture<p class="mb-0 fs--1 text-400">Upload a 300x300 jpg image with <br />a maximum size of 400KB</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-gender">Gender</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
                  <option value="">Select your gender ...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                 </select>
                </div>


                <div class="row g-2">
                  <div class="col">
                    <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-card-number">Member Id</label><input class="form-control" placeholder="Member ID" type="text" id="bootstrap-wizard-validation-card-number" /></div>
                  </div>
            
                </div>


            
          </div>
          <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab3" id="bootstrap-wizard-validation-tab3">
     
              <div class="row g-2">
                <div class="col">

                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-gender">Gender</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
                    <option value="">Select Branch ...</option>
                    <option value="Male"> </option>
                    </select>
                  </div>



                 </div>
                <div class="col">

                  <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-gender">Gender</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
                    <option value="">Select Academy ...</option>
                    <option value="Male"> </option>
                    </select>
                  </div>


                 </div>

                 <div class="row g-2">
                  <div class="col">
                    <div class="mb-3"><label class="form-label" for="bootstrap-wizard-validation-card-number">Join Date</label><input class="form-control" placeholder="Join Date" type="text" id="bootstrap-wizard-validation-card-number" /></div>
                  </div>
            
                </div>


              </div>
              
      
          </div>
          <div class="tab-pane text-center px-sm-3 p " role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
       
            <h4 class="mb-1">registration done successfully</h4>
             <a class="btn btn-primary px-5 my-3" href="{{url('student')}}">Student list</a>
             <a class="btn btn-primary px-5 my-3" href="{{route('student.create')}}">Add Payment</a>

          </div>
        </div>
      </div>
      <div class="card-footer bg-light">
        <div class="px-sm-3 px-md-5">
          <ul class="pager wizard list-inline mb-0">
            <li class="previous"><button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Prev</button></li>
            <li class="next"><button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-2"> </span></button></li>
          </ul>
        </div>
      </div>
    </div>
  </div>




@include('admin.layouts.footer')