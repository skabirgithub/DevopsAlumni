@extends('layouts.frontend')
@section('title','Students')
@section('content')
@include('includes.banner',['title'=>'Students','details'=>'Meet our students'])
<section id="page-content-wrap">
    <div class="directory-page-content-warp section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="directory-text-wrap">
                        <h2>Now we have <strong class="funfact-count">{{count($students)}}</strong> member </h2>
                        <div class="container mt-3">
                            <form action="{{ route('student.search') }}" class="row g-2">
                                <input type="hidden" name="category" value="{{ $category }}">

                                <div class="col-md-8">
                                    <select name="academic_program" class="form-select">
                                        <option selected>Academic Program</option>
                                        @foreach ($academicProgram as $key => $program)
                                            <option value="{{ $key }}">{{ $program }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                                </div>
                            </form>
                        </div>


                        <div class="directory-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        {{-- <th scope="col">Email</th> --}}
                                        <th scope="col">Faculty</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)

                                    @if($student->activeUser)
                                    <tr>
                                        <td><img src="{{asset('images/'.$student->image)}}"
                                                alt="table">{{$student->activeUser->name}}</td>
                                        {{-- <td>{{$student->activeUser->email}}</td> --}}
                                        <td>{{$student->faculty}}</td>
                                        <td>{{$student->department}}</td>
                                        <td>{{$student->batch}}</td>
                                        <td><a href="{{route('student.profile',$student->user_id)}}">View Full
                                                Profile</a></td>
                                    </tr>
                                    @endif
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    {{$students->links()}}
                    {{-- <div class="pagination-wrap text-center">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                </li>
                                <li ><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
