<div class="bg-white rounded-xl shadow-md p-5 border border-gray-200">
    <h3 class="text-lg font-semibold">{{ $judul }}</h3>
    <p class="text-gray-600">Penulis: {{ $penulis }}</p>
    <p class="text-gray-600">Tahun: {{ $tahun }}</p>
    {{ $slot ?? '' }}
</div>