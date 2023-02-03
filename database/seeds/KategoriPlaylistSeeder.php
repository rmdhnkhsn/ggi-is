<?php

use App\Models\IT_DT\guide\GuideVIdeoKategori;
use Illuminate\Database\Seeder;

class KategoriPlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'JDE',
            'IT & DT',
            'Marketing',
            'QC',
            'Mat & Dok',
            'HRD',
            'Akunting',
            'Internal Audit',
            'Produksi',
        ];

        foreach ($categories as $cateogory) {
            GuideVIdeoKategori::create([
                'nama' => $cateogory
            ]);
        }
    }
}
