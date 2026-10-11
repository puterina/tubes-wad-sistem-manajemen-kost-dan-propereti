<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $barangData = [
            ['nama' => 'AC Split 1/2 PK', 'kategori' => 'Elektronik', 'merek' => fake()->randomElement(['Daikin', 'Sharp', 'Panasonic', 'LG'])],
            ['nama' => 'Kasur Springbed Queen Size', 'kategori' => 'Perlengkapan Kamar', 'merek' => fake()->randomElement(['Comforta', 'Elite', 'Central'])],
            ['nama' => 'Lemari Pakaian 2 Pintu', 'kategori' => 'Furniture', 'merek' => fake()->randomElement(['Olympic', 'Informa', 'IKEA'])],
            ['nama' => 'Smart TV 32 Inch', 'kategori' => 'Elektronik', 'merek' => fake()->randomElement(['Samsung', 'Xiaomi', 'TCL', 'Sony'])],
            ['nama' => 'Meja Belajar Minimalis', 'kategori' => 'Furniture', 'merek' => fake()->randomElement(['Olympic', 'IKEA', 'Dekoruma'])],
            ['nama' => 'Water Heater Listrik', 'kategori' => 'Sanitari', 'merek' => fake()->randomElement(['Ariston', 'Modena', 'Rinnai'])],
            ['nama' => 'Kulkas Mini Bar', 'kategori' => 'Elektronik', 'merek' => fake()->randomElement(['Sharp', 'Aqua', 'Polytron'])],
        ];

        $pilihan = fake()->randomElement($barangData);

        return [
            'kode_barang' => 'AST-'.strtoupper(fake()->bothify('##??')),
            'nama_barang' => $pilihan['nama'],
            'kategori' => $pilihan['kategori'],
            'merek' => $pilihan['merek'],
            'kondisi_fisik' => fake()->randomElement(['baik', 'rusak_ringan', 'rusak_berat']),
            'lokasi_penempatan' => fake()->randomElement(['Kamar 101', 'Kamar 102', 'Kamar 201', 'Kamar 202', 'Ruang Tamu', 'Dapur Bersama']),
            'jumlah' => fake()->numberBetween(1, 5),
            'tanggal_pembelian' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'catatan' => fake()->optional()->sentence(),
        ];
    }
}
