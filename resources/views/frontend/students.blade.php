@extends('layouts.frontend')
@section('title','Alumni')
@section('content')
@include('includes.banner',['title'=>'Alumni','details'=>'Meet our alumni'])

<section id="page-content-wrap">
    <div class="directory-page-content-warp section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="directory-text-wrap">
                        <h2>Now we have <strong class="funfact-count">{{ count($students) }}</strong> alumni</h2>

                        <div class="container mt-4 p-4 rounded shadow-sm bg-white" style="max-width: 700px;">
                            <form action="{{ route('student.search') }}" class="row g-3">
                                <!-- Academic Program Dropdown -->
                                <div class="col-md-3">
                                    {{-- <label for="academic_program" class="form-label fw-bold">Academic Program</label> --}}
                                    <select id="academic_program" name="academic_program" class="form-select">
                                        <option selected disabled>Choose Program</option>
                                        @foreach ($academicProgram as $key => $program)
                                            <option value="{{ $key }}">{{ $program }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Name Input -->
                                <div class="col-md-6">
                                    {{-- <label for="name" class="form-label fw-bold">Search by Name</label> --}}
                                    <input type="text" style="height: 50px; font-size: 12px" id="name" name="name" class="form-control" placeholder="Enter student name">
                                </div>



                                <!-- Submit Button -->
                                <div class="col-md-3 text-center">
                                    <button type="submit" class="btn btn-primary h-100 w-100">Filter</button>
                                </div>
                            </form>
                        </div>


                        <div class="row mt-4">
                            @foreach ($students as $alumnus)
                                @if($alumnus->activeUser)
                                    <div class="col-md-4 mb-4">
                                        <div class="card shadow-sm border-0">
                                            <img src="{{ asset('images/'.$alumnus->image) }}" class="card-img-top" alt="Alumni Photo">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $alumnus->activeUser->name }}</h5>
                                                <p class="card-text">{{ $alumnus->faculty }} - {{ $alumnus->department }}</p>
                                                <p class="text-muted">Batch: {{ $alumnus->batch }}</p>
                                                <a href="{{ route('student.profile', $alumnus->user_id) }}" class="btn btn-brand">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
