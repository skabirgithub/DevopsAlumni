@extends('layouts.frontend')
@section('title','Alumni')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-size: 18px;
            background-color: #f8f9fa;
        }
        .profile-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .profile-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff;
        }
        .tab-content {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="profile-card">
                    <img src="{{asset('images/'.$user->profile->image)}}" alt="Profile Picture">
                    <h1 class="mt-3">{{$user->name}}</h1>
                    <p class="text-muted">{{$user->profile->student_type}}</p>
                    <p><strong>Department:</strong> {{$user->profile->department}}</p>
                    <p><strong>Faculty:</strong> {{$user->profile->faculty}}</p>
                    <p><strong>Job Type:</strong> {{$user->profile->job_type}}</p>
                    <p>{{$user->profile->job_details}}</p>
                    <p><strong>Email:</strong> {{$user->email}}</p>
                    <p><strong>Student ID:</strong> {{$user->profile->student_id}}</p>
                    @if ($user->profile->file)
                    <a href="{{asset('files/'.$user->profile->file)}}" class="btn btn-primary btn-sm mt-2" download>Download CV</a>
                    @endif
                    <div class="mt-3">
                        <a href="{{$user->profile->facebook}}" class="btn btn-outline-primary btn-sm">Facebook</a>
                        <a href="{{$user->profile->linkedin}}" class="btn btn-outline-primary btn-sm">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mt-4" id="profileTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#activity">Activity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#training">Training</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#club">Club</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="activity">
                <div class="row">
                    @foreach ($activities as $activity)
                    <div class="col-md-6">
                        <div class="tab-content p-3">
                            <h5>{{$activity->title}}</h5>
                            <p>{{$activity->details}}</p>
                            @if($activity->file)
                            <a href="{{asset('files/'.$activity->file)}}" class="btn btn-outline-secondary btn-sm" download>Download File</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="training">
                <div class="row">
                    @foreach ($trainings as $training)
                    <div class="col-md-6">
                        <div class="tab-content p-3">
                            <h5>{{$training->institute}}</h5>
                            <p><strong>Subject:</strong> {{$training->subject}}</p>
                            <p>{{$training->details}}</p>
                            <p><strong>Duration:</strong> {{date('d-M-Y',strtotime($training->from))}} to {{date('d-M-Y',strtotime($training->to))}}</p>
                            @if($training->file)
                            <a href="{{asset('files/'.$training->file)}}" class="btn btn-outline-secondary btn-sm" download>Download File</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="club">
                <div class="row">
                    @foreach ($clubs as $club)
                    <div class="col-md-6">
                        <div class="tab-content p-3">
                            <h5>{{$club->name}}</h5>
                            <p>{{$club->details}}</p>
                            <p><strong>Designation:</strong> {{$club->designation}}</p>
                            <p><strong>Member Since:</strong> {{date('d-M-Y',strtotime($club->member_since))}}</p>
                            @if($club->file)
                            <a href="{{asset('files/'.$club->file)}}" class="btn btn-outline-secondary btn-sm" download>Download File</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<br><br>
@endsection
