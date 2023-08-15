@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Kursus - {{ $course->courseName }}</div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nama Kursus :</strong> {{ $course->courseName }}
                    </div>
                    <div class="mb-3">
                        <strong>Harga :</strong> Rp. {{ $course->price }}
                    </div>
                    <div class="mb-3">
                        <strong>Durasi (Hari) :</strong> {{ $course->days }}
                    </div>
                    <div class="mb-3">
                        <strong>Sertifikasi :</strong> {{ $course->isCertificate ? 'Ya' : 'Tidak' }}
                    </div>
                    <div class="mb-3">
                        <strong>Instruktur Tersedia :</strong>
                        <ul>
                            @foreach ($course->qualifications as $qualification)
                                @foreach ($qualification->instructors as $instructor)
                                    <li>{{ $instructor->instructorName }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                <a href="{{ route('transactions.create', ['courseId' => $course->id]) }}" class="btn btn-primary">Ikuti Kursus</a>

            </div>
        </div>
    </div>
</div>
@endsection
