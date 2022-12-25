@extends('admin.authentication.master')

@section('title')Sign Up
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
@endpush

@section('content')
    <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/bg-login.jpg') }}" alt="looginpage" /></div>
	            <div class="col-xl-7 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form" autocomplete="off" method="post" action="{{ route('sign-up-post') }}">
                            {{ csrf_field() }}
	                        <h4>Create your account</h4>
	                        <h6>Enter your personal details to create account</h6>
	                        <div class="form-group">
	                            <label>Fullname</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-user"></i></span>
	                                <input class="form-control" name="full_name" type="text" required="" placeholder="Full Name" />
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label>Email</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control" name="email" type="email" required="" placeholder="viho@gmail.com" />
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label>Phone</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-brand-whatsapp"></i></span>
	                                <input class="form-control" name="phone" type="text" required="" placeholder="Phone" />
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label>Address</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-ui-text-chat"></i></span>
	                                <textarea class="form-control" name="address" placeholder="Address" required></textarea>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label>Username</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icofont icofont-ui-user"></i></span>
	                                <input class="form-control" type="text" name="username" placeholder="Username" required="" />
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" name="password" required="" placeholder="*********" />
	                                <!-- <div class="show-hide"><span class="show"> </span></div> -->
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="checkbox">
	                                <input id="checkbox1" type="checkbox" />
	                                <label class="text-muted" for="checkbox1">Agree with <span>Privacy Policy </span></label>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
	                        </div>
	                        <p>Already have an account?<a class="ms-2" href="{{ route('sign-in') }}">Sign in</a></p>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>


    @push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    @endpush

@endsection