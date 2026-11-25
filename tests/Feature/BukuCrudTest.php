<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Buku;

class BukuCrudTest extends TestCase
{
    public function test_can_view_buku_index_page(): void
    {
        $response = $this->get(route('buku.index'));

        $response->assertStatus(200);
        $response->assertSee('Perpustakaan FaDoo');
    }

    public function test_can_view_create_buku_page(): void
    {
        $response = $this->get(route('buku.create'));

        $response->assertStatus(200);
        $response->assertSee('Tambah Buku Baru');
    }

    public function test_can_store_new_buku(): void
    {
        $payload = [
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun' => 2005,
        ];

        $response = $this->post(route('buku.store'), $payload);

        $response->assertRedirect(route('buku.index'));
        $response->assertSessionHas('success', 'Data buku berhasil ditambahkan!');

        $this->assertDatabaseHas('bukus', [
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun' => '2005',
        ]);
    }

    public function test_validation_fails_when_store_invalid_data(): void
    {
        $response = $this->post(route('buku.store'), [
            'judul' => '',
            'penulis' => '',
            'tahun' => 'invalid',
        ]);

        $response->assertSessionHasErrors(['judul', 'penulis', 'tahun']);
    }

    public function test_can_view_edit_buku_page(): void
    {
        $buku = Buku::create([
            'judul' => 'Bumi Manusia',
            'penulis' => 'Pramoedya Ananta Toer',
            'tahun' => 1980,
        ]);

        $response = $this->get(route('buku.edit', $buku));

        $response->assertStatus(200);
        $response->assertSee('Edit Buku');
        $response->assertSee('Bumi Manusia');

        $buku->delete();
    }

    public function test_can_update_buku(): void
    {
        $buku = Buku::create([
            'judul' => 'Bumi',
            'penulis' => 'Tere Liye',
            'tahun' => 2014,
        ]);

        $updatePayload = [
            'judul' => 'Bumi (Edisi Revisi)',
            'penulis' => 'Tere Liye',
            'tahun' => 2015,
        ];

        $response = $this->put(route('buku.update', $buku), $updatePayload);

        $response->assertRedirect(route('buku.index'));
        $response->assertSessionHas('success', 'Data buku berhasil diupdate!');

        $this->assertDatabaseHas('bukus', [
            'id' => $buku->id,
            'judul' => 'Bumi (Edisi Revisi)',
            'tahun' => '2015',
        ]);

        $buku->delete();
    }

    public function test_can_delete_buku(): void
    {
        $buku = Buku::create([
            'judul' => 'Buku Sementara',
            'penulis' => 'Penulis X',
            'tahun' => 2020,
        ]);

        $response = $this->delete(route('buku.destroy', $buku));

        $response->assertRedirect(route('buku.index'));
        $response->assertSessionHas('success', 'Data buku berhasil dihapus!');

        $this->assertDatabaseMissing('bukus', [
            'id' => $buku->id,
        ]);
    }
}
