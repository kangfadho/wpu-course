@extends('layouts.app')

@section('content')
    <div class="max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Edit Buku</h2>

        <form action="{{ route('buku.update', $buku) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $buku->penulis) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('penulis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $buku->tahun) }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('tahun')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">
                    Update
                </button>
                <a href="{{ route('buku.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
