@extends('layouts.frontend')
@section('title','Register')
@section('content')
@include('includes.banner',['title'=>'Register','details'=>''])
<section id="page-content-wrap">
    <div class="register-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-page-inner">
                        <div class="col-lg-10 m-auto">
                            <div class="register-form-content">
                                <div class="row justify-content-center">
                                    <!-- Signin Area Content Start -->
                                    <div class="col-lg-6 col-md-6 text-center">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <div class="signin-area-wrap">
                                                    <h4>Register Here</h4>
                                                    <div class="sign-form">
                                                        <form method="POST" action="{{ route('register') }}">
                                                            @csrf
                                                            <input value="{{ old('name') }}" required name="name"
                                                                type="text" placeholder="Enter your Name">
                                                            <input value="{{ old('email') }}" required name="email"
                                                                type="email" placeholder="Enter your Email">
                                                            <input required minlength="8" name="password"
                                                                type="password" placeholder="Password">
                                                            <input required name="password_confirmation" minlength="8"
                                                                type="password" placeholder="Confirm Password">
                                                            <button type="submit" class="btn btn-reg">Register</button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                </div>
                                                Already a Member? <a href="{{ route('login') }}">
                                                    Login Here<br> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Signin Area Content End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.location.href = "{{ route('verify.by.api') }}";
</script>
@endsection
