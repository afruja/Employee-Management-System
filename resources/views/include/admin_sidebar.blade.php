

<div id="wrapper">
    <!-- Sidebar Section-->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fas fa-address-card"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Main
      </div>

      <!--Profile Show Section-->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/profile') }}">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Profile</span>
        </a>
      </li>

      <!--System Manage Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fab fa-windows"></i>
          <span>System Manage</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">System Manage</h6>
            <a class="collapse-item" href="{{url('admin/departments')}}">Department</a>
            <a class="collapse-item" href="{{url('admin/countries')}}">Country</a>
          </div>
        </div>
      </li>




      <!--Task Section-->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/task') }}">
          <i class="fas fa-clipboard-list"></i>
          <span>Task</span>
        </a>
      </li>



      <!--User Manage Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-users"></i>
          <span>User Manage</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Manage</h6>
            <a class="collapse-item" href="{{ url('admin/users/create') }}">Add User</a>
            <a class="collapse-item" href="{{ url('admin/users') }}">View User List</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <i class="fas fa-cogs">Settings</i>
      </div>

      <!--Award Section-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAward" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-trophy"></i>
          <span>Award</span>
        </a>
        <div id="collapseAward" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Award</h6>
            <a class="collapse-item" href="{{url('admin/award_categories')}}">Award Category</a>
            <a class="collapse-item" href="{{url('admin/give_awards')}}">Give an Award</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/notice')}}">
          <i class="fas fa-briefcase"></i>
          <span>Notice Board</span>
        </a>
      </li>



      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar Section-->
