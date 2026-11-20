@extends('layouts.app')

@section('content')
    <h2>{{ $namaAplikasi }}</h2>

    @foreach ($buku as $item)
        <h3>{{ $item['judul'] }}</h3>
        <p>Penulis : {{ $item['penulis'] }}</p>
        <p>Tahun {{ $item['tahun'] }}</p>
    @endforeach

@endsection