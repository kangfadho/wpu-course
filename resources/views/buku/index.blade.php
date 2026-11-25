@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">{{ $namaAplikasi }}</h2>
        <a href="{{ route('buku.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
            + Tambah Buku
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($buku->count())
        <div class="grid gap-4">
            @foreach ($buku as $item)
                <x-book-card
                    :judul="$item->judul"
                    :penulis="$item->penulis"
                    :tahun="$item->tahun"
                >
                    <div class="flex gap-2 mt-3">
                        <a href="{{ route('buku.edit', $item) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                            Edit
                        </a>
                        <form action="{{ route('buku.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </x-book-card>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada data buku.</p>
    @endif
@endsection
