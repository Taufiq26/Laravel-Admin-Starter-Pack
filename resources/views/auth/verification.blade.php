@extends('admin.comingsoon.master')

@section('title')Comingsoon
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	<!-- Loader starts-->
	<div class="loader-wrapper">
	    <div class="theme-loader">
	        <div class="loader-p"></div>
	    </div>
	</div>
	<!-- Loader ends-->
	<!-- page-wrapper Start-->
	<div class="page-wrapper" id="pageWrapper">
	    <!-- Page Body Start-->
	    <div class="container-fluid p-0 m-0">
	        <div class="comingsoon" style="background-image: url({{ asset('assets/images/landing/bg-verification.jpg') }})">
	            <div class="comingsoon-inner text-center">
	                <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo/logo-1.png') }}" alt="" /></a>
	                <h5>VERIFICATION EMAIL</h5>
	                <div class="countdown" id="clockdiv">
                        <span>Successfully Verification Email, Thank you for registered account!</span><br><br>
                        <a href="{{ url('auth/sign-in')}}" class="btn btn-primary">Login now</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	@push('scripts')
	<script src="{{ asset('assets/js/countdown.js') }}"></script>
	@endpush

@endsection