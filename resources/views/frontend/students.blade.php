@extends('layouts.frontend')
@section('title','Students')
@section('content')
@include('includes.banner',['title'=>'Students','details'=>'This is a page. This is a demo paragraph.This is a demo senten.'])
<section id="page-content-wrap">
    <div class="directory-page-content-warp section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="directory-text-wrap">
                    <h2>Now we have <strong class="funfact-count">{{count($students)}}</strong> member </h2>
                        <div class="table-search-area">
                            <form action="https://codeboxr.net/themedemo/unialumni/html/index.html">
                                <input type="search" placeholder="Type Your Keyword">
                                <select name="dept">
                                    <option selected>Dept</option>
                                    <option value="cmt">Computer</option>
                                    <option value="cmt">Computer</option>
                                    <option value="cmt">Computer</option>
                                    <option value="cmt">Computer</option>
                                    <option value="cmt">Computer</option>
                                </select>
                                <button class="btn btn-brand">Search</button>
                            </form>
                        </div>

                        <div class="directory-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Faculty</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        
                                    <tr>
                                        <td><img src="{{asset('images/'.$student->image)}}" alt="table">{{$student->user->name}}</td>
                                        <td>{{$student->user->email}}</td>
                                        <td>{{$student->faculty}}</td>
                                        <td>{{$student->department}}</td>
                                        <td>{{$student->batch}}</td>
                                        <td>{{$student->student_id}}</td>
                                        <td><a href="#">View Full Profile</a></td>
                                    </tr>
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
