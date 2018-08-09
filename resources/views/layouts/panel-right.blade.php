 <div id="aside" class="app-aside modal nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside dark dk" data-layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a class="navbar-brand">
          <div ui-include="'../assets/images/logo.svg'"></div>
          <img src="../assets/images/logo.png" alt="." class="hide">
          <span class="hidden-folded inline">Itobuz-Plus</span>
        </a>
        <!-- / brand -->
      </div>
 <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
            
              <ul class="nav" ui-nav>
                <li class="submenu">
                  <a href="{{ url('/dashboard') }}">
                     <span class="user-icon"><i class="fa fa-dashboard"></i> Dashboard</span>
                  </a>
                </li>
                 <li class="submenu">
                  <a href="{{ url('/users') }}">
                     <span class="user-icon"><i class="fa fa-user"></i> Users</span>
                  </a>
                  <a href="{{ url('/teams') }}">
                    <span class="team-icon"><i class="fa fa-users"></i> Teams</span>
                  </a>
                   <a href="{{ url('/roles') }}">
                    <span class="role-icon"><i class="fa fa-circle"></i> Roles</span>
                  </a>
                  <a href="{{ url('/policies') }}">
                    <span class="policy-icon"><i class="fa fa-list"></i> Policy</span>
                  </a>
                  <a href="#">
                    <span class="leave-icon"><i class="fa fa-bed"></i> Leave</span>
                  </a>
                </li>
              </ul>
          </nav>
      </div>
      <div class="b-t">
        <div class="nav-fold">
              <span class="clear hidden-folded p-x">
                @if(Auth::user()->image=='')
                <img src="{{ URL::asset('images/default_dp.jpg') }}" style="width:30px;height:30px" class="w-40 img-circle" >
                @else
                <img src="{{ URL::asset('images/'.Auth::user()->image) }}" style="width:30px;height:30px" class="w-40 img-circle" >
                @endif
               <small class="text-muted">{{Auth::user()->name}}</small>
                <small class="block text-muted"><i class="fa fa-circle text-success"></i> online</small>
               <a href="{{ url('logout') }}">
                <span class="logout-text"><i class="fa fa-sign-out"></i>Logout</span>
               </a>
              </span>
        </div>
      </div>
    </div>
  </div>

  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
        
            <!-- Page title - Bind to $state's title -->
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>           
        
            <!-- navbar right -->

          
            <ul class="nav navbar-nav ml-auto flex-row">
              <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown"> 
                <i class="fa fa-circle text-success"></i>
                @if(Auth::user()->image=='')
                <img src="{{ URL::asset('images/default_dp.jpg') }}" style="width:30px;height:30px" class="w-40 img-circle" >
                @else
                <img src="{{ URL::asset('images/'.Auth::user()->image) }}" style="width:30px;height:30px" class="w-40 img-circle" >
                @endif
                  <span class="profile-name"><b>{{ Auth::user()->name }}</b></span>
                  <b class="caret"></b>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('profile')}}"><b>Profile</b></a></li>
                    <li><a href="{{ url('logout') }}"><b>Logout</b></a></li>
                  </ul>
                    <i class="on b-white bottom"></i>
                </a>
                <div ui-include="'../views/blocks/dropdown.user.html'"></div>
              </li>
              <li class="nav-item dropdown pos-stc-xs">
                <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>Itobuz-Plus</strong> <span class="hidden-xs-down">- Built by Itobuz Technologies Pvt. Ltd.</span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">