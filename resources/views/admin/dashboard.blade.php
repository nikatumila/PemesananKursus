@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dashboard-header">
        <h1>Selamat datang, Admin</h1>
    </div>
    <br>
    <br>
    <br>
    <div class="dashboard-menu">
        <div class="dashboard-menu-row">
            <a href="{{ route('courses.index') }}" class="dashboard-menu-item btn btn-lg">Manajemen Kursus</a>
            <a href="{{ route('instructors.index') }}" class="dashboard-menu-item btn btn-lg">Manajemen Instruktur</a>
            <a href="{{ route('qualifications.index') }}" class="dashboard-menu-item btn btn-lg">Manajemen Kualifikasi</a>
        </div>
        <div class="dashboard-menu-row">
            <a href="{{ route('members.index') }}" class="dashboard-menu-item btn btn-primary btn-lg">Kelola Member</a>
            <a href="{{ route('admin.reports') }}" class="dashboard-menu-item btn btn-lg">Laporan Transaksi</a>
        </div>
    </div>

    <!-- Place your admin dashboard content here -->
</div>
<style>
    .dashboard-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .dashboard-menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .dashboard-menu-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }
    .dashboard-menu-item {
        flex: 1;
        min-width: 200px;
        padding: 20px;
        background-color: #3490dc;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        transition: background-color 0.3s ease;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-size: 18px;
    }
    .dashboard-menu-item:hover {
        background-color: #2779bd;
    }
</style>
@endsection
