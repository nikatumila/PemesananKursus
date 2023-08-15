@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Member</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Jenis Member</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->isAdmin())
                    @continue
                @endif
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->member }}</td>
                    <td>

                            <a href="{{ route('members.edit', $user->id) }}" class="btn btn-warning mr-2">Edit</a>
                            <form action="{{ route('members.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">Hapus</button>
                            </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
