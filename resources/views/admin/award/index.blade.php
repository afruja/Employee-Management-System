@extends('layouts.admin')
  @section('main')
  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Give an Award Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item">Award</li>
              <li class="breadcrumb-item active" aria-current="page">Give an Award</li>
            </ol>
          </div>
    <div class="row">
            <!--Give an Award DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAward"
                    id="#addAwardBoard">Give an Award</button>
                </div>
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

                      @foreach($awards as $give_awards)
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
                            <button data-give_awards_id="{{ $give_awards->id }}" data-user_id="{{ $give_awards->user->id }}"
                            data-award_category_id="{{ $give_awards->awardCategory->id }}" data-gift_item="{{ $give_awards->gift_item }}" data-cash_price="{{ $give_awards->cash_price }}" data-date="{{ $give_awards->date }}" type="button" class="btn btn-warning"data-toggle="modal" data-target="#updateAward"
                    	       id="#updateAwardBoard"><i class="fas fa-user-edit">Update</i></button>
                        		<button data-give_awards_id="{{ $give_awards->id }}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAward"
                            	id="#deleteAwardBoard"><i class="fas fa-trash">Delete</i></button>
                              <a href="{{ url('admin/give_awards/') }}/{{ $give_awards->id }}">
                            <button type="button" class="btn btn-success"><li class="far fa-eye">View</li></button></a>
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

 <!--Add Give an Award Modal Center -->
            <div class="modal fade" id="addAward" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addAwardBoard">Give an Award</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="{{ url('admin/give_awards') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
              <div class="form-group">
                        <label>Award Name</label>
                        <select name="award_category_id" class="form-control font-weight-bold" required>
                          <option>Select Award Name</option>
                          @foreach($award_categories as $award_category)
                                  <option value="{{ $award_category->id }}">{{ $award_category->award_category }} </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>User Name</label>
                        <select type="text" name="user_id" class="form-control font-weight-bold" required>
                          <option>User Name</option>
                            @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->id }})  </option>
                              @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Gift Item</label>
                        <input type="text" name="gift_item" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Cash Price</label>
                        <input name="cash_price" type="number" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Date</label>
                        <input name="date" type="Date" name="date" class="form-control font-weight-bold" required>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


          <!--Update Give an Award Modal Center -->
          	<div class="modal fade" id="updateAward" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="updateAwardBoard">Update Award</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
            <form action="{{url('admin/give_awards/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="modal-body">
                <input type="hidden" name="give_awards_id" id="give_awards_id">
                <div class="form-group">
                      <label>Award Name</label>
                      <select name="award_category_id" id="award_category_id" class="form-control font-weight-bold">
                          @foreach($award_categories as $award_category)
                                  <option value="{{ $award_category->id }}">{{ $award_category->award_category }} </option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label>User Name</label>
                      <select type="text" name="user_id" id="user_id" class="form-control font-weight-bold">
                            @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->id }})  </option>
                              @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label>Gift Item</label>
                      <input name="gift_item" id="gift_item" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Cash Price</label>
                      <input name="cash_price" id="cash_price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input name="date" id="date" type="Date" name="date" class="form-control font-weight-bold" required>
                      </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

<!--Delete Give an Award Modal Center -->
      <div class="modal fade" id="deleteAward" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteAwardBoard">Delete Give an Award</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{url('admin/give_awards/destroy')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body">
                    <input type="hidden" name="give_awards_id" id="give_awards_id">
                      Are You Sure,You Want To Delete This Give an Award?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
              </form>
            </div>
          </div>
        </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
@endsection

@section('scripts')
  
    <script>
      /*-----Give an Award Modal Update Scripts-----*/
    $('#updateAward').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var give_awards_id = button.data('give_awards_id')
        var award_category_id = button.data('award_category_id')
        var user_id = button.data('user_id')
        var gift_item = button.data('gift_item')
        var cash_price = button.data('cash_price')
        var date = button.data('date')
        var modal = $(this)
        modal.find('.modal-title').text('Update Give an Award')
        modal.find('.modal-body #give_awards_id').val(give_awards_id);
        modal.find('.modal-body #award_category_id').val(award_category_id);
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #gift_item').val(gift_item);
        modal.find('.modal-body #cash_price').val(cash_price);
        modal.find('.modal-body #date').val(date);

    });
      /*-----Give an Award Modal Delete Scripts-----*/
    $('#deleteAward').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var give_awards_id = button.data('give_awards_id')
        var modal = $(this)
        modal.find('.modal-title').text('Update Give an Award')
        modal.find('.modal-body #give_awards_id').val(give_awards_id);

    });
    </script>
@endsection
