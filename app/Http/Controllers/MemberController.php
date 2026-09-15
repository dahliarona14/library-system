<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Andi Pratama',
            'Budi Santoso',
            'Citra Dewi',
            'Dina Lestari',
            'Eko Prasetyo'
        ];

        return view('members.index', compact('members'));
    }
}