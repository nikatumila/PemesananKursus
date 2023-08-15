@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Member</h1>
    <form action="{{ route('members.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="member">Jenis Member</label>
            <select class="form-control" id="member" name="member">
                <option value="">Bukan Member</option>
                <option value="{{ \App\Models\User::MEMBER_SILVER }}" {{ $user->isMember(\App\Models\User::MEMBER_SILVER) ? 'selected' : '' }}>Silver</option>
                <option value="{{ \App\Models\User::MEMBER_GOLD }}" {{ $user->isMember(\App\Models\User::MEMBER_GOLD) ? 'selected' : '' }}>Gold</option>
                <option value="{{ \App\Models\User::MEMBER_PLATINUM }}" {{ $user->isMember(\App\Models\User::MEMBER_PLATINUM) ? 'selected' : '' }}>Platinum</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
