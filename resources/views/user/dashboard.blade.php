@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dashboard-header">
        @auth
            <h1>Selamat datang {{ Auth::user()->name }}</h1>
        @else
            <h1>Selamat datang Pengguna</h1>
        @endauth
    </div>
    <!-- Place your user dashboard content here -->
    <div class="dashboard-content">
        <h2>Daftar Kursus Tersedia</h2>
        <ul class="course-list">
            @foreach ($courses as $course)
                <li class="course-item">
                    <h3><a href="{{ route('course.detail', ['id' => $course->id]) }}">{{ $course->courseName }}</a></h3>
                    <p>{{ $course->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<style>
    .dashboard-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .dashboard-content {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }
    .course-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .course-item {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .course-item:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }
    .course-item h3 {
        margin: 0;
        font-size: 20px;
        color: #3490dc;
    }
    .course-item p {
        margin: 10px 0 0;
        font-size: 14px;
        color: #6c757d;
    }
</style>
@endsection
