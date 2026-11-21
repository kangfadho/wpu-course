@extends('layouts.app')

@section('content')
    <h2>{{ $namaAplikasi }}</h2>

    @foreach ($buku as $item)
        <x-book-card     
            :judul="$item['judul']" 
            :penulis="$item['penulis']" 
            :tahun="$item['tahun']" 
        />
    @endforeach

@endsection