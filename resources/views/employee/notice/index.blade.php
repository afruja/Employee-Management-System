@extends('layouts.employee')
  @section('main')
  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Notice Board Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('employee/profile') }}">Profile</a></li>

              <li class="breadcrumb-item active" aria-current="page">Notice Board</li>
            </ol>
          </div>
    <div class="row">

            <!--Notice Board DataTable with Hover Section-->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created On</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php($i=1)
                      @foreach($notice_boards as $notice_boards)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$notice_boards->notice_title}}</td>
                        <td>{{$notice_boards->notice_description}}</td>
                        <td>{{$notice_boards->created_at}}</td>
                    	</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>

    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


@endsection

