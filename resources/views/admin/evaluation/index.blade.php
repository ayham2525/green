@include('admin.layouts.header')
@include('admin.layouts.nav')


   <div class="container" data-layout="container">
     
      
        <div class="content">
       
         
       
          <div class="card mb-3">
            <div class="card-body">
              <div class="row flex-between-center">
                <div class="col-md">
                  <h5 class="mb-2 mb-md-0">Add evaluation</h5>
                </div>
               </div>
            </div>
          </div>
          <div class="row ">



            <div  class="col-lg-4  ">
                <div  class="mb-6">
                  <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                      <h6 class="mb-0">Student</h6>
                    </div>
                    <div  class="card-body">
                      <div class="row gx-2">
                        <div class="col-12 mb-3"><label class="form-label" for="product-category">Select Branch:</label><select class="form-select" id="product-category" name="product-category">
                            <option value="computerAccessories"></option>
   
                          </select>
                      </div>
                        <div class="col-12 mb-3"><label class="form-label" for="product-subcategory">Select Academy:</label><select class="form-select" id="product-subcategory" name="product-subcategory">
                            <option value="laptop"></option>
              
                          </select>
                      </div>
  
  
                      <div class="col-12"><label class="form-label" for="product-subcategory">Select Student:</label><select class="form-select" id="product-subcategory" name="product-subcategory">
                          <option value="laptop"></option>
            
                        </select>
                    </div>
  
  
  
                      </div>
                    </div>
                  </div>
   
             
              
  
                </div>
              </div>





            <div class="col-lg-8 pe-lg-2">



                <div class="row">
              <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                      <h6 class="mb-0">TECHNICAL</h6>
                    </div>
                    <div class="card-body">
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Shooting (GK Handling)</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Passing/Receiving</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Dribbling (GK Shot Stopping)</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Turning (GK Throwing)</label></div>
 
                    </div>
                  </div>
              </div>



              <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                      <h6 class="mb-0">TACTICAL</h6>
                    </div>
                    <div class="card-body">
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Positional Play</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Awareness</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Decision Making</label></div>
                      <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Creativity</label></div>
 
                    </div>
                  </div>
              </div>

                </div>





                <div class="row">
                    <div class="col-lg-6">
                      <div class="card mb-3">
                          <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">PHYSICAL</h6>
                          </div>
                          <div class="card-body">
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Speed</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Balance</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Agility</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Coordination</label></div>
       
                          </div>
                        </div>
                    </div>
      
      
      
                    <div class="col-lg-6">
                      <div class="card mb-3">
                          <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">SOCIAL/MENTAL</h6>
                          </div>
                          <div class="card-body">
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Behavior</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Communication</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Enthusiasm</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery" type="radio" name="product-shipping" /><label class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Concentration</label></div>
       
                          </div>
                        </div>
                    </div>
      
                      </div>



 
      

            </div>
       



            
          </div>



          <div class="row">
            <div class="col-lg-6">
      
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                     </div>
                    <div class="card-body">
                      <div class="row gx-2">
                        <h4>
                            Skills Challenge Scores
                        </h4>
                          
                        </div>



                        <div class="row">

                            <div class="col-lg-6">
                                  <div class="col-12 mb-3"> 
                                <input class="form-control datetimepicker" id="release-date" type="text" data-options='{"dateFormat":"d/m/y","disableMobile":true}' />
                            </div>
    
    
                            <div class="form-group mb-3">
                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
    
    
                            <div class="col-12 mb-3">
                             
                                <input class="form-control" id="warranty-length" type="text" />
                            </div>
    
                            <div class="form-group mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                             </div></div>
                            <div class="col-lg-6">
                                <div class="col-12 mb-3"> 
                                    <input class="form-control datetimepicker" id="release-date" type="text" data-options='{"dateFormat":"d/m/y","disableMobile":true}' />
                                </div>
        
        
                                <div class="form-group mb-3">
                                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
        
        
                                <div class="col-12 mb-3">
                                 
                                    <input class="form-control" id="warranty-length" type="text" />
                                </div>
        
                                <div class="form-group mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                 </div>
                            </div>
                        </div>
                       
                     
           


                      </div>
                    </div>
            </div>

            <div class="col-lg-6">
                      
          <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
             </div>
            <div class="card-body">
              <div class="row gx-2">
                <h4>
                    Individual skills to focus on
                </h4>
                   <div class="create-product-description-textarea"><textarea class="tinymce d-none" data-tinymce="data-tinymce" name="product-description" id="product-description" required="required"></textarea></div>
                </div>
               
             
                <div class="col-12 mb-3"> 
                    <input class="form-control datetimepicker" id="release-date" type="text" data-options='{"dateFormat":"d/m/y","disableMobile":true}' />
                </div>
                <div class="col-12 mb-3"> 
                    <input class="form-control" id="warranty-length" type="text" />
                </div>
                <div class="col-12 mb-3"> 
                    <input class="form-control" id="warranty-policy" type="text" />
                </div>

                <div class="form-group mb-6">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                 </div>

              </div>
            </div>
            </div>
          </div>
          </div>



          
         



          <div class="card">
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
               
                <div class="col-auto">
                     <button class="btn btn-primary btn-lg btn-block" role="button">Send </button>
                </div>
              </div>
            </div>
          </div>
        
        </div>
       
      </div>
    


@include('admin.layouts.footer')
