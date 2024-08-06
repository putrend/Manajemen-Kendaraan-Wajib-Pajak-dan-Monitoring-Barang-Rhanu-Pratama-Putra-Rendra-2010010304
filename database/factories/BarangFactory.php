<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                "nama_barang" => fake()->streetName(),
                "merk_barang" => fake()->streetName(),
                "nama_merk" => fake()->streetName(),
                "biaya" => rand(1, 10000) * 10,
                "jumlah_barang" => rand(1, 5) * 5,
                "detail_barang" => fake()->streetName(),
                "kategori_id" => rand(1, 5),
                "harga_total" => rand(1,5)
        ];
    }
}
