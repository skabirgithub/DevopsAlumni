@extends('layouts.frontend')
@section('title','Home')
@section('content')
    <h3>Index</h3>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
    
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('user.profile.view')}}">Profile</a>
                <a class="dropdown-item" href="{{route('user.change.password')}}">Change Password</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('blogs') }}">{{ __('Blogs') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('galleries') }}">{{ __('Gallery') }}</a>
        </li>
    </ul>
@endsection