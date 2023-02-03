<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Log;

class BreadcrumbTranslate{
    public static function generate($url){
        $collection = collect([
            ['url' => 'cmc', 'name' => 'All Factory'],
            ['url' => 'branch0', 'name' => 'All Branch'],
            ['url' => 'branch1', 'name' => 'Cileunyi'],
            ['url' => 'branch2', 'name' => 'Maja1'],
            ['url' => 'branch3', 'name' => 'Maja2'],
            ['url' => 'branch4', 'name' => 'Kalibenda'],
            ['url' => 'branch5', 'name' => 'Chawan'],
            ['url' => 'branch9', 'name' => 'CNJ2'],
            ['url' => 'branch10', 'name' => 'Anugrah'],
            ['url' => 'branch11', 'name' => 'CBA'],
            ['url' => 'quality', 'name' => 'Quality Control'],
            ['url' => 'indah', 'name' => 'GGI Indah'],
            ['url' => 'itd', 'name' => 'IT & DT'],
            ['url' => 'qcr', 'name' => 'Quality Control'],
            ['url' => 'hrd', 'name' => 'HR & GA'],
            ['url' => 'podelay', 'name' => 'PO Due Date'],
            ['url' => 'mtd', 'name' => 'Mat & Doc'],
            ['url' => 'prd', 'name' => 'Production'],
            ['url' => 'fns', 'name' => 'Finishing'],
            ['url' => 'icr', 'name' => 'Internal Control'],
            ['url' => 'apv', 'name' => 'Approval'],
            ['url' => 'acf', 'name' => 'Accounting'],


        ]);
        $result = $collection->where('url', $url)->first();
        if ($result) {
            $url=$result['name'];
        } 
        return $url;
    }
}