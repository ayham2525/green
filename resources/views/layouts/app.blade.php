@include('admin.layouts.header')
@include('admin.layouts.nav')

 
<div class="row g-3 mb-3">
    <div class="col-xxl-6 col-xl-12">
      <div class="row g-3">
        <div class="col-12">
          <div class="card bg-transparent-50 overflow-hidden">
            <div class="card-header position-relative">
              <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;"></div>
              <!--/.bg-holder-->
              <div class="position-relative z-index-2">
                <div>
                  <h3 class="text-primary mb-1">Good Afternoon, {{auth()->user()->name}}!</h3>
                  <p>Start To Manage Your Branch </p>
                </div>
                <div class="d-flex py-3">
               
              
                </div>
              </div>
            </div>
       
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
    @include('admin.layouts.footer')
