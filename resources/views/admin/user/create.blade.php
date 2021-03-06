@extends('layouts.admin')
@section('main')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add User Page</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item">User Manage</li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </div>
</div>
<form action="{{ url('admin/users') }}" method="POST" enctype="multipart/form-data" id="user-add-form">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Personal Details Section -->
            <div class="card mb-4 ml-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Details</h6>
                </div>
                <div class="card-body">
                        <div class="col-lg-12">
                            {{-- Ajax picture --}}
                            <div class="profile-img">
                                <img id="image_preview_container" src="{{ asset('img/avatar.svg') }}" class="rounded-circle" />
                                <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="file" name="avater" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Fathers Name</label>
                            <input type="text" name="father" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="fas fa-calendar"></div>
                            <input type="Date" name="date_of_birth" class="flatp form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood">
                                <option value="">Select</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" name="address" rows="4" class="form-control"></textarea>
                        </div>
                </div>
            </div>
        </div>

        <!-- Company Details Section -->
        <div class="col-lg-6">
            <div class="card mb-4 ml-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Company Details</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="number" name="id" id="id" onkeyup="checkId()" class="form-control" placeholder="(Optional)">
                        <span id="user-exist" class="error"></span><span id="available" class="text-success"></span>
                    </div>

                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select</option>
                            <option value="Admin">Admin</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" onkeyup="checkEmail();">
                        <p id="email-exist" class="error"></p>
                    </div>

                    <div class="form-group">
                        <label>NID Number</label>
                        <input type="number" name="nid" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select name="department" class="form-control" id="department" onchange="getDesignation();">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <select name="designation" class="form-control" id="designation">
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Salary</label>
                        <select name="salary" class="form-control">
                            <option value="">Select Salary</option>
                            @foreach($salaries as $salary)
                                <option value="{{ $salary->amount }}">{{ $salary->amount }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Date of Joining</label>
                        <div class="fas fa-calendar"></div>
                        <input type="text" name="join" class="form-control flatp">
                    </div>

                </div>


                <div class="form-group col-lg-12 ml-5">
                    <button type="submit" class="btn btn-primary p-2 w-50 ml-5">Submit</button>
                </div>
            </div>
        </div>

    </div>
</form>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


@endsection



@section('scripts')
    <script src="{{asset('/vendor/validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/vendor/validation/custom.rules.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/vendor/validation/validate.css') }}">
   
    <script>
        $(document).ready(function () {
            refresh();

        //Live upload profile photo
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            function refresh() {
                getDesignation();
            };

            // form validation ruls
            $("#user-add-form").validate({
                // Specify validation rules
                rules: {
                // The key name on the left side is the name attribute of an input field
                // Validation rules are defined on the right side.
                name: "required",
                father: "required",
                date_of_birth: {
                    validDOB: true
                },
                gender: "required",
                blood_group: "required",
                mobile: {
                    required: true,
                    minlength: 11
                    },
                address: "required",
                id: {
                    number: true
                    },
                type: "required",
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                nid: {
                    required: true,
                    minlength: 10,
                    number: true
                },
                department: "required",
                designation: "required",
                salary: "required",
                country: "required",
                designation: "required",
                join: "required",


                },
                // Specify validation error messages
                messages: {
                name: "User Name is required",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                email: "Please enter a valid email address"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                form.submit()
                // alert('Submitted')
                }
            });

        });

        //  set designation by department
        function getDesignation() {
            var department = $('#department').val();
            var url = '{{ url('admin/get-designation') }}?department=' + department;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    if(status = 200){
                        $("#designation").html('<option value="' + data.deg1 + '">' + data.deg1 +
                            '</option><option value="' + data.deg2 + '">' + data.deg2 +
                            '</option>');
                    }
                }
            });
        }

        //  CHECK EMAIL
        function checkEmail() {
            var email = $('#email').val();
            var url = '{{ url('admin/check-email') }}?email='+email;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                    if(data == email){
                        $("#email-exist").html('Email already exist!');
                    }else{
                    }
                }
            });
            $("#email-exist").html('');
        }

        //  CHECK id
        function checkId() {
            var id = $('#id').val();
            var url = '{{ url('admin/check-id') }}?id='+id;
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data,status) {
                        $("#available").html('');
                        $("#user-exist").html('User id already exist!');
                },
                error: function(){
                    $("#user-exist").html('');
            $("#available").html('Available');
                }
            });
        }



        $(".flatp").flatpickr({
            maxDate: "today"
        });

    </script>

@endsection
