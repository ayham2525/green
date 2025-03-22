@include('admin.layouts.header')
@include('admin.layouts.nav')



 




<div class="col-lg-12">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="mb-0">Payment Details</h5>
      </div>
      <div class="card-body bg-light">
          <div class="row gx-3 mb-3">


            <div class="col-6 col-sm-4">

              <div class=""><label class="form-label" for="bootstrap-wizard-validation-gender">Branch</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
                <option value="">Select Branch ...</option>
                 </select>
              </div>
  
  
             </div>

             
          <div class="col-6 col-sm-4">

            <div class=""><label class="form-label" for="bootstrap-wizard-validation-gender">Academy</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
              <option value="">Select Academy ...</option>
              <option value="Male"> </option>
              </select>
            </div>


           </div>




           
          <div class="col-6 col-sm-4">

            <div class=""><label class="form-label" for="bootstrap-wizard-validation-gender">Student</label><select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
              <option value="">Select student ...</option>
              <option value="Male"> </option>
              </select>
            </div>


           </div>




         </div>
        <div class="row gx-3 mb-3">
  
 

          <div class="col-6 col-sm-4"><label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Payment Date</label><input class="form-control" id="expDate" placeholder="15/2024" type="text" /></div>
          <div class="col-6 col-sm-4"><label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Start Date</label><input class="form-control" id="expDate" placeholder="15/2024" type="text" /></div>
           <div class="col-6 col-sm-4"><label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">End Date</label><input class="form-control" id="expDate" placeholder="15/2024" type="text" /></div>
         </div>


         <div class="row gx-3 mb-3">
  
 

          <div class="col-6 col-sm-3">
            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Amount </label>
            <input class="form-control" id="expDate"   type="text" /></div>
          <div class="col-6 col-sm-3"><label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Discount </label><input class="form-control" id="expDate"   type="text" /></div>
           <div class="col-6 col-sm-3"><label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Still Amount</label><input class="form-control" id="expDate"  type="text" /></div>
           <div class="col-6 col-sm-3">

            <div class="">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="expDate">Payment Method </label>
                <select class="form-select" name="gender" id="bootstrap-wizard-validation-gender">
              <option value="">Card</option>
               </select>
            </div>
  
            
  
  
           </div>
        </div>


 

         <div class="col-12 col-sm-12">
  
  
            <div class="mb-3"><label class="form-label" for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>

  
  
           </div>
  







      </div>
    </div>
  </div>







@include('admin.layouts.footer')