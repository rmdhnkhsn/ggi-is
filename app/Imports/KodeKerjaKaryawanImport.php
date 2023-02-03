<?php
   
namespace App\Imports;
   
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Cutting\Product_Costing\MasterKodeKerja;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;

    
class KodeKerjaKaryawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $input=null;

    public function  __construct($input)
    {
        $this->input = $input;
        // dd($input);
    }

    
    public function model(array $row)
    {
        $inputan = $this->input;
        // dd($inputan);

        $kode_kerja = MasterKodeKerja::where('kode_kerja', $inputan['kode_kerja'])->first();
        // dd($kode_kerja);

        // Variable Tunggal 
        $uang_makan = str_replace(',', '', round($row['uang_makan']));
        $gaji_pokok = str_replace(',', '', round($row['gaji_pokok'],0));
        $prem_krj = str_replace(',', '', round($row['prem_krj']));
        $tun_tetap = str_replace(',', '', round($row['tun_tetap']));

        // Hitung Gaji Pokok + Tunjangan 
        $gp_tun = $gaji_pokok+$tun_tetap;

        // Hitung THP (Take Home Pay)
        $var_thp = 20.5;
        $thp = $gp_tun + ($var_thp*$prem_krj);

        // Hitung Gaji per hari 
        $gaji_per_hari = $thp/$inputan['hari_kerja'];

        // Hitung Gaji per Jam
        $gaji_per_jam = $gaji_per_hari / $kode_kerja->jam_kerja;

        // Hitung Gaji per jam lembur 
        $gaji_per_jam_lembur = $gp_tun / 173;

        // Hitung BPJamsostek 
        $bpjamsostek = $gp_tun*6.24/100;

        // Hitung BPJS_KS 
        $bpjs_ks = $gp_tun *4/100;

        $data = [
            'periode' => $inputan['periode'],
            'tahun' => $inputan['tahun'],
            'hari_kerja' => $inputan['hari_kerja'],
            'nik' => $row['nik'],
            'gedung' => $row['gedung'],
            'group' => $row['group'],
            'kategory' => $row['kategory'],
            'gaji_pokok' => $gaji_pokok,
            'prem_krj' => $prem_krj,
            'tun_tetap' => $tun_tetap,
            'thp' => $thp,
            'gp_tun' => $gp_tun,
            'gaji_per_hari' => $gaji_per_hari,
            'gaji_per_jam' => $gaji_per_jam,
            'gaji_per_jam_lembur' => $gaji_per_jam_lembur,
            'bpjamsostek' => $bpjamsostek,
            'bpjs_ks' => $bpjs_ks,
            'uang_makan' => $uang_makan,
            'kode_kerja' => $kode_kerja->kode_kerja,
        ];

        // $input = KodeKerjaKaryawan::create($data);

        // dd($data);
        $result = KodeKerjaKaryawan::where('periode', $data['periode'])->where('tahun', $data['tahun'])->where('nik', $data['nik'])->count();
        // dd($result);
        if ($result == 0) {
            $input = KodeKerjaKaryawan::create($data);
        }else {
            $input = KodeKerjaKaryawan::where('periode', $data['periode'])->where('tahun', $data['tahun'])->where('nik', $data['nik'])->first();
            KodeKerjaKaryawan::where('id', $input->id)->update($data);
        }
        
        return $input;
    }
}