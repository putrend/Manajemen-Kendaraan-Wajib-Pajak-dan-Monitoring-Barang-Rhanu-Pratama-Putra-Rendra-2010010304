<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangkeluar>
 */
class BarangkeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id' => rand(1,5),
            'ruangan_id' => rand(1,5),
            'user_id' => rand(1,5),
            'jumlah_keluar' => rand(1,5),
            'tanggal_keluar' => fake() -> date()
        ];
    }
}
