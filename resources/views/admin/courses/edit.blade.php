@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kursus</h1>
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="courseName">Nama Kursus</label>
                <input type="text" class="form-control" id="courseName" name="courseName" value="{{ $course->courseName }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="days">Durasi (Hari)</label>
                <input type="number" class="form-control" id="days" name="days" value="{{ $course->days }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="isCertificate">Bersertifikasi</label>
                <select class="form-control" id="isCertificate" name="isCertificate" required>
                    <option value="0" {{ $course->isCertificate ? '' : 'selected' }}>Tidak</option>
                    <option value="1" {{ $course->isCertificate ? 'selected' : '' }}>Ya</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="isActive">Status</label>
                <select class="form-control" id="isActive" name="isActive" required>
                    <option value="0" {{ $course->isActive ? '' : 'selected' }}>Tidak Aktif</option>
                    <option value="1" {{ $course->isActive ? 'selected' : '' }}>Aktif</option>
                </select>
            </div>
            <br>
            <div class="d-flex justify-content-between mb-3">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
