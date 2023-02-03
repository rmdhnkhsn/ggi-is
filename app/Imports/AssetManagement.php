<?php
   
namespace App\Imports;
   
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Production\Asset\asset_machine;


    
class AssetManagement implements ToModel, WithHeadingRow
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
    }

    
    public function model(array $row)
    {
        $inputan = $this->input;
dd($inputan);
        $kode_kerja = asset_machine::first();
        
        $data = [
            'id' => $inputan['id'],
            'code' => $inputan['code'],
            'tipe' => $inputan['tipe'],
            'jenis' => $inputan['jenis'],
            'merk' => $inputan['merk'],
            'deskripsi' => $inputan['deskripsi'],
            'varian' => $inputan['varian'],
            'serialno' => $inputan['serialno'],
            'coOrigin' => $inputan['coOrigin'],
            'brOrigin' => $inputan['brOrigin'],
            'brLokasi' => $inputan['brLokasi'],
            'tipeLokasi' => $inputan['tipeLokasi'],
            'supplier' => $inputan['supplier'],
            'kondisi' => $inputan['kondisi'],
            'lokasi' => $inputan['lokasi'],
            'status' => $inputan['status'],
         
        ];


         dd($data);
        $result = asset_machine::where('serialno', $data['serialno'])->count();
        // dd($result);
        if ($result == 0) {
            $input = asset_machine::create($data);
        }else {
            $input = asset_machine::where('periode', $data['periode'])->first();
            asset_machine::where('id', $input->id)->update($data);
        }
        
        return $input;
    }
}