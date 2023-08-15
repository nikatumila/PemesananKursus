<?php

// app/Http/Controllers/MemberController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.members.index', compact('users'));
    }

    public function create()
    {
        $users = User::whereNull('member')->get();
        return view('admin.members.create', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.members.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member' => 'nullable|string|in:' . implode(',', [
                User::MEMBER_SILVER, User::MEMBER_GOLD, User::MEMBER_PLATINUM, null
            ]),
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'member' => $request->member,
        ]);

        return redirect()->route('members.index')
            ->with('success', 'Jenis member berhasil diubah.');
    }


    public function destroy(User $user)
    {
        $user->update(['member' => null]);
        return redirect()->route('members.index')
            ->with('success', 'Jenis member berhasil dihapus.');
    }
}


