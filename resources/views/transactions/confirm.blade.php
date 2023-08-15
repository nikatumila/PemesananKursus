@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Konfirmasi Transaksi</h1>
        </div>
        <div class="card-body">
            <p><strong>Nama Kursus:</strong> {{ $course->courseName }}</p>
            <p><strong>Harga:</strong> {{ $course->price }}</p>
            <p><strong>Durasi:</strong> {{ $course->days }} Hari</p>
            <p><strong>Sertifikat:</strong> {{ $course->iscertificate ? 'Ya' : 'Tidak' }}</p>
            <p><strong>Nama Instruktur:</strong> {{ $instructor->instructorName }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Jenis Member:</strong> {{ $member }}</p>
            <p><strong>Subtotal:</strong> {{ $subtotal }}</p>
            <p><strong>Diskon:</strong> {{ $discount }}</p>
            <p><strong>Total:</strong> {{ $total }}</p>
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="instructor_id" value="{{ $instructor->id }}">
                <button type="submit" class="btn btn-primary">Buat Transaksi</button>
            </form>
        </div>
    </div>
</div>
@endsection
