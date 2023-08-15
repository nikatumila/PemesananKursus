@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Instruktur</h1>
    <div class="d-flex justify-content-between mb-3">
    <a href="{{ route('instructors.create') }}" class="btn btn-primary">Tambah Instruktur</a>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Pengalaman (Tahun)</th>
                <th>Deskripsi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->id }}</td>
                    <td>{{ $instructor->instructorName }}</td>
                    <td>{{ $instructor->age }}</td>
                    <td>{{ $instructor->gender }}</td>
                    <td>{{ $instructor->expYear }}</td>
                    <td>{{ $instructor->expDesc }}</td>
                    <td>
                        <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" class="d-inline">
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
