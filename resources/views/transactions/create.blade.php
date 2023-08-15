@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Ikut Kursus</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('transactions.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <div class="form-group">
                    <label for="instructor">Pilih Instruktur:</label>
                    <select class="form-control" id="instructor" name="instructor_id">
                        @foreach ($course->qualifications as $qualification)
                            @foreach ($qualification->instructors as $instructor)
                                <option value="{{ $instructor->id }}">{{ $instructor->instructorName }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
