@extends('layouts.employee')
@section('main')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Task Page</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('employee/profile') }}">Profile</a></li>
            <li class="breadcrumb-item">Task</li>
        </ol>
    </div>
</div>
<div class="row">
    <!--Task DataTable with Hover Section-->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Attachment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->subject }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->duration }}</td>
                                <td>
                                    @if ($task->attachment)
                                        <a href="{{ url('employee/task/'.$task->id)}}">Download</a>
                                    @endif
                                </td>
                                <td>{{ $task->status }}</td>
                                <td>
                                    @if($task->status == 'Requested')
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#submitTask" data-id="{{ $task->id }}" id="#submitTaskBoard">Submit Now</button>
                                    @elseif($task->status == 'Rejected')
                                        <button data-id="{{ $task->id }}" type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#updateTask" id="#updateTaskBoard">Re-Submit</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Submit Task Modal Center -->
<div class="modal fade" id="submitTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitTaskBoard">Submit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('employee/task') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="taskID">
                    <div class="form-group">
                        <label for="attachment">Choose file</label>
                        <input type="file" name="user_file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Comment</label>
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="Optional">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Update Task Modal Center -->
<div class="modal fade" id="updateTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTaskBoard">Update Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('employee/task/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="taskID">
                    <div class="form-group">
                        <label for="attachment">Choose file</label>
                        <input type="file" name="user_file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Comment</label>
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="Optional">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#submitTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var task_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #taskID').val(task_id);
        });

        $('#updateTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var task_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Delete Task Name');
            modal.find('.modal-body #taskID').val(task_id);
        });

    </script>

@endsection
