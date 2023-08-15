@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Kualifikasi</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('qualifications.create') }}" class="btn btn-primary">Tambah Kualifikasi</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kursus</th>
                <th>Instruktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($qualifications as $qualification)
                <tr>
                    <td>{{ $qualification->id }}</td>
                    <td>{{ optional($qualification->course)->courseName }}</td>
                    <td>
                        @foreach ($qualification->instructors as $instructor)
                            {{ $instructor->instructorName }}<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('qualifications.edit', $qualification->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('qualifications.destroy', $qualification->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kualifikasi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada kualifikasi yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
