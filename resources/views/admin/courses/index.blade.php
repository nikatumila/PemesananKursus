@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manajemen Kursus</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Buat Kursus</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kursus</th>
                    <th>Harga</th>
                    <th>Durasi (Hari)</th>
                    <th>Sertifikasi</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->courseName }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->days }}</td>
                        <td>{{ $course->isCertificate ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $course->isActive ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
