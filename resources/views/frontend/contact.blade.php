@extends('layouts.frontend')
@section('title','Contact Us')
@section('content')
@include('includes.banner',['title'=>'Contact','details'=>''])
<br>
<div class="container">
    <div class="row">
        <!-- Left Section: Contact Form -->
        <div class="col-md-6">
            <br>
            <h3>Contact Us</h3><br>
            <form class="contact-form" data-parsley-validate method="POST" action="{{route('submit.feedback')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name*</label>
                    @guest
                    <input data-parsley-trigger="change" value="{{old('name')}}" required type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    @else
                    <input data-parsley-trigger="change" required type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name" placeholder="Enter name">
                    @endguest
                </div>

                <div class="form-group">
                    <label for="email">Email address*</label>
                    @guest
                    <input data-parsley-trigger="change" value="{{old('email')}}" required type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    @else
                    <input data-parsley-trigger="change" required type="email" class="form-control" id="email" value="{{Auth::user()->email}}" name="email" placeholder="Enter email">
                    @endguest
                </div>

                <div class="form-group">
                    <label for="phone">Phone*</label>
                    <input data-parsley-trigger="change" required value="{{old('phone')}}" type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                </div>

                <div class="form-group">
                    <label for="message">Message*</label>
                    <textarea name="message" required class="form-control" id="message" rows="3">{{old('message')}}</textarea>
                </div>

                <button type="submit" class="btn btn-reg">Submit</button>
            </form>
        </div>

        <!-- Right Section: Office Address & Google Map -->
        <div class="col-md-6">
            <br>
            <h3>Our Office</h3>
            <p><strong>Bangladesh University of Professionals (BUP)</strong></p>
            <p>Mirpur Cantonment, Dhaka-1216, Bangladesh</p>
            <p>Phone: <a href="tel:+8801769021962">+88 01769-021962</a></p>
            <p>Email: <a href="mailto:alumni@bup.edu.bd">alumni@bup.edu.bd</a></p>

            <!-- Google Maps Embed -->
            <div class="mt-3">
                <iframe
                    width="100%"
                    height="300"
                    style="border:0;"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.3504520951853!2d90.35651207221377!3d23.83986159999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1410ff7f515%3A0x7655eae2540befbe!2sBangladesh%20University%20of%20Professionals%20(BUP)!5e0!3m2!1sen!2sbd!4v1739127282244!5m2!1sen!2sbd">
                </iframe>
                
            </div>
        </div>
    </div>
</div>
<br>
@endsection
