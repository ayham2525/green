<?php 
use App\Models\Admin\Branches;
use App\Models\Admin\Academy;
 

$branches = Branches::all();
$academy = Academy::all();


?>



<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" data-double-top-nav="data-double-top-nav">
    <div class="w-100">
      <div class="d-flex flex-between-center">
        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDoubleTop" aria-controls="navbarDoubleTop" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="{{url('/')}}">
          <div class="d-flex align-items-center"><img class="me-2" src="{{url('assets/img/logo.png')}}" alt="" width="200" /><span class="font-sans-serif"></span></div>
        </a>
     
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
          <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
          </li>
 
    
 
          <li class="nav-item dropdown">
            <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-xl">
                <img class="rounded-circle" src="{{url('assets/img/avatar.png')}}" alt="" />
              </div>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
              <div class="bg-white dark__bg-1000 rounded-2 py-2">
                 <a class="dropdown-item">{{auth()->user()->name}}</a>
 
                <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <hr class="my-2 d-none d-lg-block" />
      <div class="collapse navbar-collapse scrollbar py-lg-2" id="navbarDoubleTop">
        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Branch</a>
            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
              <div class="bg-white dark__bg-1000 rounded-3 py-2">

                    
        
                @foreach($branches as $x)
                @if (((auth()->user()->admin_type == 'branch_admin') || (auth()->user()->admin_type == 'academy_admin')) && (auth()->user()->branch_id == $x->id)  )

                <a class="dropdown-item link-600 fw-medium" href="{{url('branch')}}/{{$x->id}}">{{$x->branch_name}}</a>
        

                @elseif((auth()->user()->admin_type == 'full_admin'))
                <a class="dropdown-item link-600 fw-medium" href="{{url('branch')}}/{{$x->id}}">{{$x->branch_name}}</a>
                @endif
                @endforeach
          
                  </a>
              </div>
            </div>
          </li>

 

          @if ((auth()->user()->admin_type == 'full_admin')  )


          <li class="nav-item "><a class="nav-link " href="{{route('programs.index')}}" role="button"   aria-haspopup="true" aria-expanded="false">program</a>
           
          </li>
 


     



          <li class="nav-item "><a class="nav-link " href="{{url('payment')}}" role="button"   aria-haspopup="true" aria-expanded="false">Payments</a>
           
          </li>


          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Setting</a>
            <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
              <div class="bg-white dark__bg-1000 rounded-3 py-2">
                 <a class="dropdown-item link-600 fw-medium" href="{{url('/programs')}}">programs</a>
                 <a class="dropdown-item link-600 fw-medium" href="{{url('branch')}}">branch</a>
                 <a class="dropdown-item link-600 fw-medium" href="{{url('academy')}}">academy</a>
 
                
                </a>
              </div>
            </div>
          </li>
 
 
          <li class="nav-item "><a class="nav-link " href="{{url('admins')}}" role="button"   aria-haspopup="true" aria-expanded="false">Admins</a>
           
          </li>


         <li class="nav-item "><a class="nav-link " href="{{url('evaluation')}}" role="button"   aria-haspopup="true" aria-expanded="false">Evaluation</a>
           
          </li>


          <li class="nav-item "><a class="nav-link " href="{{url('uniform')}}" role="button"   aria-haspopup="true" aria-expanded="false">uniforms</a>
           
          </li>


          <li class="nav-item "><a class="nav-link " href="{{url('scan')}}" role="button"   aria-haspopup="true" aria-expanded="false">QR Scann</a>
           
          </li>
  

 
 


@endif

<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Report</a>
  <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
    <div class="bg-white dark__bg-1000 rounded-3 py-2">
       <a class="dropdown-item link-600 fw-medium" href="{{url('/report')}}">Financial Report</a>
       <a class="dropdown-item link-600 fw-medium" href="{{url('/uniformreport')}}">uniform Report</a>

       <a class="dropdown-item link-600 fw-medium" href="{{url('/programreport')}}">program Report</a>

       <a class="dropdown-item link-600 fw-medium" href="{{url('/statusreport')}}">status report </a>




      
      </a>
    </div>
  </div>
</li>
 
 
        </ul>
      </div>
    </div>
  </nav>