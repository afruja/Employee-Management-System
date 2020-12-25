<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        <!-- TopBar Section-->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger badge-counter">{{ $data ? $data:'' }}</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Notifications
                        </h6>
                        @foreach($newLeaves as $leave)
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('employee/leave') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">Leave Request</div>
                                <span class="font-weight-bold">Leave request accepted</span>
                            </div>
                        </a>
                        @endforeach
                        @foreach($newTasks as $task)
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('employee/task') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">New Task</div>
                                <span class="font-weight-bold">New task request from Admin</span>
                            </div>
                        </a>
                        @endforeach
                        @foreach($comTasks as $task)
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('employee/task') }}/{{ $task->id }}/edit?status=Finished">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">Congratulations</div>
                                <span class="font-weight-bold">Your task has been Finished!</span>
                            </div>
                        </a>
                        @endforeach
                        @foreach($rejTasks as $task)
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('employee/task') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">Task</div>
                                <span class="font-weight-bold">Your task has been rejected!</span>
                            </div>
                        </a>
                        @endforeach
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="{{asset('storage/'.Auth::user()->avater) }}" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small"> {{ Auth::user()->name }} </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ url('employee/profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!--Finish Topbar Section-->
