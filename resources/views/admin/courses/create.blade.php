@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambahkan Kursus Baru</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="courseName">Nama Kursus</label>
                <input type="text" class="form-control" id="courseName" name="courseName" required>
            </div>
            <br>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <br>
            <div class="form-group">
                <label for="days">Durasi (Hari)</label>
                <input type="number" class="form-control" id="days" name="days" value="{{ old('days') }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="isCertificate">Bersertifikasi</label>
                <input type="checkbox" id="isCertificate" name="isCertificate" value="1">
            </div>
            <br>
            <div class="d-flex justify-content-between mb-3">
                <button type="submit" class="btn btn-primary">Buat</button>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </form>
    </div>
@endsection
