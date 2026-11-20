<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $namaAplikasi = 'Perpustakaan FaDoo';
        
        
        $buku =[
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrean Hirata',
                'tahun' => 2005,
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere LiYe',
                'tahun' => 2009,
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'tahun' => 2009,
            ],
        ];
        return view('buku', compact('namaAplikasi', 'buku'));
    }

}
