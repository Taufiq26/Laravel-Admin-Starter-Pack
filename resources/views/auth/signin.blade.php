@extends('admin.authentication.master')

@section('title')login
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/bg-login.jpg') }}" alt="looginpage" /></div>
	        <div class="col-xl-7 p-0">
	            <div class="login-card">
	                <form class="theme-form login-form needs-validation" novalidate="" method="post" action="{{ route('sign-in-post') }}">
                        {{ csrf_field() }}
	                    <h4>Login</h4>
	                    <h6>Welcome back! Log in to your account.</h6>
	                    <div class="form-group">
	                        <label>Username</label>
	                        <div class="input-group">
	                            <span class="input-group-text"><i class="icon-email"></i></span>
	                            <input class="form-control" name="username" type="text" required="" placeholder="viho@gmail.com" />
	                            <div class="invalid-tooltip">Please enter proper username.</div>
                            </div>
	                    </div>

	                    <div class="form-group">
	                        <label>Password</label>
	                        <div class="input-group">
	                            <span class="input-group-text"><i class="icon-lock"></i></span>
	                            <input class="form-control" type="password" name="password" required="" placeholder="*********" />
	                            <div class="invalid-tooltip">Please enter password.</div>
	                            <!-- <div class="show-hide"><span class="show"> </span></div> -->
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
	                    </div>
	                    <p>Don't have account?<a class="ms-2" href="{{ route('sign-up') }}">Create Account</a></p>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<script>
	    (function () {
	        "use strict";
	        window.addEventListener(
	            "load",
	            function () {
	                // Fetch all the forms we want to apply custom Bootstrap validation styles to
	                var forms = document.getElementsByClassName("needs-validation");
	                // Loop over them and prevent submission
	                var validation = Array.prototype.filter.call(forms, function (form) {
	                    form.addEventListener(
	                        "submit",
	                        function (event) {
	                            if (form.checkValidity() === false) {
	                                event.preventDefault();
	                                event.stopPropagation();
	                            }
	                            form.classList.add("was-validated");
	                        },
	                        false
	                    );
	                });
	            },
	            false
	        );
	    })();
	</script>

    @push('scripts')
    <script>

        $( document ).ready(function() {
            var alert = "{{ Session::get('error') }}";

            if(alert != '') {
                notification(alert);
            }

            function notification(message){
                $.notify({
                    title:'Notification',
                    message: message
                },
                {
                    type:'danger',
                    allow_dismiss:false,
                    newest_on_top:false ,
                    mouse_over:false,
                    showProgressbar:false,
                    spacing:10,
                    timer:2000,
                    placement:{
                        from:'top',
                        align:'center'
                    },
                    offset:{
                        x:30,
                        y:30
                    },
                    delay:1000 ,
                    z_index:10000,
                    animate:{
                        enter:'animated bounce',
                        exit:'animated bounce'
                    }
                });
            }
        });
    </script>
    @endpush

@endsection