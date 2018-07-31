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
                     <span class="user-icon"><i class="fa fa-users"></i> Users</span>
                  </a>
                </li>
              </ul>
          </nav>
      </div>
      <div class="b-t">
        <div class="nav-fold">
              <span class="clear hidden-folded p-x">
               <small class="text-muted">User</small>
                <small class="block text-muted"><i class="fa fa-circle text-success"></i> online</small>
               <a href="#">
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
                   <div class="avatar w-32"> 
                  <span class="profile-name">
                    User</span>
                  <b class="caret"></b>
                  <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                  </ul>
                    <i class="on b-white bottom"></i>
                  </div>
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