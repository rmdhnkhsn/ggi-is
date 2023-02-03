<?php

namespace App\Services\CommandCenter\Grafik;

use App\Branch;
use App\Services\tanggal;
use App\Services\CommandCenter\Grafik\nilai;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\dataCC\level2;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class graph_all{

    public function datapokok()
    {
        $tanggal = (new tanggal)->commandCenter();
        $branch = Branch::select('id')->get()->toArray();
        // dd($branch);
        $dataSemua = [];

        foreach ($branch as $key => $value) {
            $dataBranch = Branch::findorfail($value['id']);
            $id = $dataBranch->id;

            $dataValue = (new qc)->ValuePerBranch($dataBranch, $tanggal, $id);
            $dataCC = (new level2)->data($dataValue, $dataBranch, $id);
            
            $dataSemua[] = [
                'id_branch' => $dataBranch->id,
                'branch' => $dataBranch->nama_branch,
                'nilai' => (new overall)->level2($dataCC),
                'issues' => (new issues)->level2($dataCC)
            ];
        }
        
        return $dataSemua;
    }
}