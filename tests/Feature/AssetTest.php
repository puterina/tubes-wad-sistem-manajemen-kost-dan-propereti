<?php

namespace Tests\Feature;

use App\Models\Asset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssetTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_render_assets_index_page(): void
    {
        Asset::factory()->create([
            'nama_barang' => 'AC Split 1/2 PK',
            'merek' => 'Daikin',
        ]);

        $response = $this->get(route('assets.index'));

        $response->assertStatus(200);
        $response->assertSee('Modul D: Inventaris Aset Kos');
        $response->assertSee('AC Split 1/2 PK');
    }

    public function test_can_create_an_asset(): void
    {
        $payload = [
            'kode_barang' => 'AST-TEST-01',
            'nama_barang' => 'Smart TV 43 Inch',
            'kategori' => 'Elektronik',
            'merek' => 'Samsung',
            'kondisi_fisik' => 'baik',
            'lokasi_penempatan' => 'Kamar 301',
            'jumlah' => 1,
            'tanggal_pembelian' => '2024-05-10',
            'catatan' => 'Layar 4K HDR',
        ];

        $response = $this->post(route('assets.store'), $payload);

        $response->assertRedirect(route('assets.index'));
        $this->assertDatabaseHas('assets', [
            'kode_barang' => 'AST-TEST-01',
            'nama_barang' => 'Smart TV 43 Inch',
            'merek' => 'Samsung',
        ]);
    }

    public function test_validates_required_fields_when_creating_asset(): void
    {
        $response = $this->post(route('assets.store'), []);

        $response->assertSessionHasErrors(['nama_barang', 'kategori', 'merek', 'kondisi_fisik', 'lokasi_penempatan', 'jumlah']);
    }

    public function test_can_update_an_asset(): void
    {
        $asset = Asset::factory()->create([
            'nama_barang' => 'Kasur Busa',
            'kondisi_fisik' => 'baik',
        ]);

        $response = $this->put(route('assets.update', $asset), [
            'kode_barang' => $asset->kode_barang,
            'nama_barang' => 'Kasur Busa Rebounded',
            'kategori' => $asset->kategori,
            'merek' => $asset->merek,
            'kondisi_fisik' => 'rusak_ringan',
            'lokasi_penempatan' => $asset->lokasi_penempatan,
            'jumlah' => 2,
        ]);

        $response->assertRedirect(route('assets.index'));
        $this->assertDatabaseHas('assets', [
            'id' => $asset->id,
            'nama_barang' => 'Kasur Busa Rebounded',
            'kondisi_fisik' => 'rusak_ringan',
            'jumlah' => 2,
        ]);
    }

    public function test_can_delete_an_asset(): void
    {
        $asset = Asset::factory()->create();

        $response = $this->delete(route('assets.destroy', $asset));

        $response->assertRedirect(route('assets.index'));
        $this->assertDatabaseMissing('assets', ['id' => $asset->id]);
    }

    public function test_can_search_assets(): void
    {
        Asset::factory()->create([
            'nama_barang' => 'Lemari Kayu Jati',
            'merek' => 'Olympic',
            'lokasi_penempatan' => 'Kamar 101',
        ]);
        Asset::factory()->create([
            'nama_barang' => 'Kipas Angin Dinding',
            'merek' => 'Miyako',
            'lokasi_penempatan' => 'Kamar 202',
        ]);

        $response = $this->get(route('assets.index', ['search' => 'Olympic']));

        $response->assertStatus(200);
        $response->assertSee('Lemari Kayu Jati');
        $response->assertDontSee('Kipas Angin Dinding');
    }
}
