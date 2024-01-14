<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('kriteria_nilais')->insert(
            [
                [
                    'kriteria' => 'rapot',
                    'bobot' => 1,
                    'nilai_awal' => 96,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'rapot',
                    'bobot' => 2,
                    'nilai_awal' => 90,
                    'nilai_akhir' => 95,
                ],
                [
                    'kriteria' => 'rapot',
                    'bobot' => 3,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 89,
                ],
                [
                    'kriteria' => 'ranking',
                    'bobot' => 1,
                    'nilai_awal' => 4,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'ranking',
                    'bobot' => 2,
                    'nilai_awal' => 2,
                    'nilai_akhir' => 3,
                ],
                [
                    'kriteria' => 'ranking',
                    'bobot' => 1,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 1,
                ],
                [
                    'kriteria' => 'matematika',
                    'bobot' => 1,
                    'nilai_awal' => 80,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'matematika',
                    'bobot' => 2,
                    'nilai_awal' => 70,
                    'nilai_akhir' => 79,
                ],
                [
                    'kriteria' => 'matematika',
                    'bobot' => 3,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 69,
                ],
                [
                    'kriteria' => 'fisika',
                    'bobot' => 1,
                    'nilai_awal' => 80,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'fisika',
                    'bobot' => 2,
                    'nilai_awal' => 70,
                    'nilai_akhir' => 79,
                ],
                [
                    'kriteria' => 'fisika',
                    'bobot' => 2,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 69,
                ],
                [
                    'kriteria' => 'kimia',
                    'bobot' => 1,
                    'nilai_awal' => 80,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'kimia',
                    'bobot' => 2,
                    'nilai_awal' => 70,
                    'nilai_akhir' => 79,
                ],
                [
                    'kriteria' => 'kimia',
                    'bobot' => 2,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 69,
                ],
                [
                    'kriteria' => 'biologi',
                    'bobot' => 1,
                    'nilai_awal' => 80,
                    'nilai_akhir' => 100,
                ],
                [
                    'kriteria' => 'biologi',
                    'bobot' => 2,
                    'nilai_awal' => 70,
                    'nilai_akhir' => 79,
                ],
                [
                    'kriteria' => 'biologi',
                    'bobot' => 2,
                    'nilai_awal' => 1,
                    'nilai_akhir' => 69,
                ],
            ]
        );
    }
}
