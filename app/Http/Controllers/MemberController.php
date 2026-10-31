<?php

namespace App\Http\Controllers;

use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::select('name', 'email')->get();

        return view('members.index', compact('members'));
    }
}
