@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3>Detail Transaksi</h3>
                <p><strong>Kode Transaksi :</strong> {{ $transaction->transCode }}</p>
                <p><strong>Tanggal Transaksi :</strong> {{ $transaction->transDate }}</p>
                <p><strong>Nama Pelanggan :</strong> {{ $transaction->custName }}</p>
                <p><strong>Jenis Member :</strong> {{ $transaction->member }}</p>
                <p>Total Harga : {{ $transaction->total }}</p>
                <br>
                <p>Silakan transfer total pembayaran ke nomor rekening berikut:</p>
                <p><strong>Nomor Rekening :</strong> 1234-5678-9012-3456</p>
                <p><strong>Bank :</strong> Bank ABC</p>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary mr-3">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
