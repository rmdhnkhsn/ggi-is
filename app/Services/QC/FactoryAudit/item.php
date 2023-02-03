<?php

namespace App\Services\QC\FactoryAudit;
use App\Branch;
use App\Models\QC\FactoryAudit\factoryAudit;




class item{
    public function itemFA()
    {
         $items = [
               
            '0' => 'BOXER',         
            '1' => 'TRUNK',         
            '2' => 'MIDWAY',         
            '3' => 'YOUTH BXR',         
            '4' => 'YOUTH MIDWAY',         
            '5' => 'TOP',         
            '6' => 'BOTTOM',         
            '7' => 'SET',         
            '8' => 'ACCESORIES',         
            '9' => 'UNDERWEAR',         
            '10' => 'SKIRT',         
            
        ];
        return $items;
    }


}





