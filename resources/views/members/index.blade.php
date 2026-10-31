@extends('layouts.app')

@section('title', 'Data Member')

@section('content')

    <h2>Data Member Perpustakaan</h2>

    <ul>
        @foreach($members as $member)
            <li>
                {{ $member->name }} - {{ $member->email }}
            </li>
        @endforeach
    </ul>

@endsection
