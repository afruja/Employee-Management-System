@extends('layouts.employee')
  @section('main')
  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Award</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('employee/profile') }}">Profile</a></li>
              <li class="breadcrumb-item">Award</li>
            </ol>
          </div>
    <div class="row">
            <!--Give an Award DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Award</th>
                        <th>Gift</th>
                        <th>Cash Price</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($award as $give_awards)
                      <tr>
                        <td>{{ $give_awards->user->id }}</td>
                        <td>{{ $give_awards->user->name }}</td>
                        <td>
                          {{ $give_awards->awardCategory->award_category}}
                        </td>
                        <td>{{ $give_awards->gift_item }}</td>
                        <td>{{ $give_awards->cash_price }}</td>
                        <td>{{ $give_awards->date }}</td>
                        
                        <td>
                              <a href="{{ url('employee/award/') }}/{{ $give_awards->id }}">
                            <button type="button" class="btn btn-success"><li class="far fa-eye"> Export Certificate</li></button></a>
                       </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

 @endsection