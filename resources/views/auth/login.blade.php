@include('admin.layouts.header')

 




<div class="container-fluid">
    <div class="row min-vh-100 flex-center g-0">
      <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
        <div class="card overflow-hidden z-index-1">
          <div class="card-body p-0">
            <div class="row g-0 h-100">
              <div class="col-md-5 text-center bg-card-gradient">
                <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                  <div class="bg-holder bg-auth-card-shape" style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);"></div>
                  <!--/.bg-holder-->
                  <div class="z-index-1 position-relative"><a class="link-light mb-4 mt-8 font-sans-serif fs-4 d-inline-block fw-bolder" >Green Sport</a>
                   </div>
                </div>
                <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                 </div>
              </div>
              <div class="col-md-7 d-flex flex-center">
                <div class="p-4 p-md-5 flex-grow-1">
                  <div class="row flex-between-center">
                    <div class="col-auto">
                      <h3>Account Login</h3>
                    </div>
                  </div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
       
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="card-checkbox" checked="checked" /><label class="form-check-label mb-0" for="card-checkbox">Remember me</label></div>
                      </div>
                      <div class="col-auto"><a class="fs--1" href="forgot-password.html">Forgot Password?</a></div>
                    </div>
                    <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button></div>
                  </form>
                  <div class="position-relative mt-4">
                    <hr />
                    <div class="divider-content-center"></div>
                  </div>
                  <div class="row g-2 mt-2">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  
@include('admin.layouts.footer')
