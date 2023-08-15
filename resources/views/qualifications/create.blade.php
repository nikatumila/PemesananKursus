@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kualifikasi</h1>
    <form action="{{ route('qualifications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="topicID" class="form-label">Kursus</label>
            <select class="form-control" id="topicID" name="topicID" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Instruktur</label>
            @foreach ($instructors as $instructor)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="instructorIDs[]" value="{{ $instructor->id }}">
                    <label class="form-check-label">{{ $instructor->instructorName }}</label>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between mb-3">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('qualifications.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
