@extends('layouts.admin')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header text-center">{{ __('Please Change Your Password,Default Password (123456) are not Allow') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('password/change') }}" id="change_password">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Set Password and Continue') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{asset('/dashboard/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('/vendor/validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/vendor/validation/custom.rules.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/vendor/validation/validate.css') }}">

    <script>
        $(document).ready(function () {

            // form validation ruls
            $("#change_password").validate({
                // Specify validation rules
                rules: {
                // The key name on the left side is the name attribute of an input field
                // Validation rules are defined on the right side
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: '#password',
                        minlength: 6
                    },


                },

                // Specify validation error messages
                messages: {
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please provide confirm password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                },

                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                form.submit()
                // alert('Submitted')
                }
            });

        });
    </script>
@endsection
