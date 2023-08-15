@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Instruktur</h1>
    <form action="{{ route('instructors.update', $instructor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="instructorName" class="form-label">Nama</label>
            <input type="text" class="form-control" id="instructorName" name="instructorName" value="{{ $instructor->instructorName }}" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Umur</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $instructor->age }}" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Laki-laki" {{ $instructor->gender === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $instructor->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="expYear" class="form-label">Pengalaman (Tahun)</label>
            <input type="number" class="form-control" id="expYear" name="expYear" value="{{ $instructor->expYear }}" required>
        </div>
        <div class="mb-3">
            <label for="expDesc" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="expDesc" name="expDesc" rows="3">{{ $instructor->expDesc }}</textarea>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('instructors.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
    </form>
</div>
@endsection
