@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Laporan Transaksi</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reports') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <select name="member" class="form-control">
                            <option value="">Pilih Jenis Member</option>
                            <option value="Silver" {{ old('member') === 'Silver' ? 'selected' : '' }}>Silver</option>
                            <option value="Gold" {{ old('member') === 'Gold' ? 'selected' : '' }}>Gold</option>
                            <option value="Platinum" {{ old('member') === 'Platinum' ? 'selected' : '' }}>Platinum</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="course_id" class="form-control">
                            <option value="">Pilih Nama Kursus</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->courseName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="instructor_id" class="form-control">
                            <option value="">Pilih Nama Instruktur</option>
                            @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->id }}" {{ old('instructor_id') == $instructor->id ? 'selected' : '' }}>{{ $instructor->instructorName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Member</th>
                        <th>Nama Kursus</th>
                        <th>Nama Instruktur</th>
                        <th>Subtotal</th>
                        <th>Diskon</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        @foreach ($transaction->detailTransactions as $detailTransaction)
                            <tr>
                                <td>{{ $transaction->transCode }}</td>
                                <td>{{ $transaction->transDate }}</td>
                                <td>{{ $transaction->custName }}</td>
                                <td>{{ $transaction->member }}</td>
                                <td>{{ $detailTransaction->course->courseName }}</td>
                                <td>{{ $detailTransaction->instructor->instructorName }}</td>
                                <td>{{ $transaction->subtotal }}</td>
                                <td>{{ $transaction->discount }}</td>
                                <td>{{ $transaction->total }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="chart-container">
                <canvas id="monthlyTransactionChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    var dataTransaksiBulanan = @json($monthlyTransactions);
    var ctx = document.getElementById('monthlyTransactionChart').getContext('2d');

    var tanggal = dataTransaksiBulanan.map(item => item.date);
    var jumlahTransaksi = dataTransaksiBulanan.map(item => item.transaction_count);
    var subtotal = dataTransaksiBulanan.map(item => item.subtotal);
    var diskon = dataTransaksiBulanan.map(item => item.discount);
    var total = dataTransaksiBulanan.map(item => item.total);

    var grafikTransaksiBulanan = new Chart(ctx, {
    type: 'bar', // Menggunakan tipe grafik batang
    data: {
        labels: tanggal,
        datasets: [
            {
                label: 'Jumlah Transaksi',
                data: jumlahTransaksi,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Subtotal',
                data: subtotal,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Diskon',
                data: diskon,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Total',
                data: total,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            datalabels: {
                anchor: 'end',
                align: 'top',
                formatter: (value, context) => value, // Menampilkan nilai di atas grafik batang
                font: {
                    weight: 'bold'
                }
            }
        }
    }
});

</script>


@endsection
