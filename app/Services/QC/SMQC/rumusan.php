<?php

namespace App\Services\QC\SMQC;

class rumusan{
    public function bagi($request)
    {
        if($request->g1 == null){
            $g1_bagi=0;
        }else{
            $g1_bagi=1;
        }
        if($request->g2 == null){
            $g2_bagi=0;
        }else{
            $g2_bagi=1;
        }
        if($request->g3 == null){
            $g3_bagi=0;
        }else{
            $g3_bagi=1;
        }
        if($request->g4 == null){
            $g4_bagi=0;
        }else{
            $g4_bagi=1;
        }
        if($request->g5 == null){
            $g5_bagi=0;
        }else{
            $g5_bagi=1;
        }
        if($request->g6 == null){
            $g6_bagi=0;
        }else{
            $g6_bagi=1;
        }
        if($request->g7 == null){
            $g7_bagi=0;
        }else{
            $g7_bagi=1;
        }
        if($request->g8 == null){
            $g8_bagi=0;
        }else{
            $g8_bagi=1;
        }
        if($request->g9 == null){
            $g9_bagi=0;
        }else{
            $g9_bagi=1;
        }
        if($request->g10 == null){
            $g10_bagi=0;
        }else{
            $g10_bagi=1;
        }
        if($request->g11 == null){
            $g11_bagi=0;
        }else{
            $g11_bagi=1;
        }
        if($request->g12 == null){
            $g12_bagi=0;
        }else{
            $g12_bagi=1;
        }

        $bagi = $g1_bagi + $g2_bagi + $g3_bagi + $g4_bagi + $g5_bagi + $g6_bagi + $g7_bagi + $g8_bagi + $g9_bagi + 
                $g10_bagi + $g11_bagi + $g12_bagi ;
        return $bagi;
    }

    public function rata_rata($request)
    {
        $rata = $request->g1 + $request->g2 + $request->g3 + $request->g4 + $request->g5 + $request->g6 +
                $request->g7 + $request->g8 + $request->g9 + $request->g10 + $request->g11 + $request->g12;
        // dd($rata);
        return $rata;
    }

    public function rata_rata2($bagi, $rata_rata)
    {
        if($rata_rata && $bagi > 0){
            $rata2 = $rata_rata / $bagi;
        }else{
            $rata2 = null;
        }
        return $rata2;
    }

    public function g_rat($rata_rata2, $request)
    {
        if($rata_rata2 > 0) {    
            $g_rat = ($rata_rata2 - $request->g_standar) / $request->g_standar * 100;
        }elseif($rata_rata2 == null){
            $g_rat = null;
        }else{
            $g_rat= "F";
        }
        if($g_rat >= -5 && $g_rat <= 5)
        {
            $g_rat = "P";
        }elseif($g_rat == null){
            $g_rat = 'P';
        }
        else{
            $g_rat = "F";
        }

        return $g_rat;
        // dd($g_rat);
    }

    public function fabric_weight($request, $per)
    {
        $fw_req= $request->fw_req;
        $fw_ac= $request->fw_ac;
        $fw_diff= round($fw_ac - $fw_req,2);
        $per = 100;
        if($fw_req > 0){
            $fw_per = round($fw_diff / $fw_req * $per, 3);
        }else{
            $fw_per= $request->fw_per;
        }
        $rat= 0.0/100;
        if ($fw_per >= $rat)
        {
            $fw_rat = 'P';
        }else{
            $fw_rat = 'F';
        }
        $data = [
            'fw_req' => $fw_req,
            'fw_ac' => $fw_ac,
            'fw_diff' => $fw_diff,
            'fw_per' => $fw_per,
            'fw_rat' => strtoupper($fw_rat),
        ];
        
        return $data;
    }

    public function fabric_length($request, $per)
    {
        $fl_req= $request->fl_req;
        $fl_ac= $request->fl_ac;
        $fl_diff= round($fl_ac - $fl_req,2);
        if($fl_req > 0){
            $fl_per = round($fl_diff / $fl_req * $per, 2);
        }else{
            $fl_per= $request->fl_per;
        }
        $rat= 0.0/100;
        if ($fl_per >= $rat)
        {
            $fl_rat = 'P';
        }else{
            $fl_rat = 'F';
        }

        $data = [
            'fl_req' => $fl_req,
            'fl_ac' => $fl_ac,
            'fl_diff' => $fl_diff,
            'fl_per' => $fl_per,
            'fl_rat' => strtoupper($fl_rat),
        ];

        return $data;
    }

    public function shrinkage($request)
    {
        // Length 
        $per = 100;
        $l_a1= $request->l_a1;
        $l_b1= $request->l_b1;
        $l_c1= round($request->l_b1 - $request->l_a1,3);
        $l_d1= round(($l_c1/$request->l_a1) * $per,3);

        

        $l_a2= $request->l_a2;
        $l_b2= $request->l_b2;
        $l_c2= round($request->l_b2 - $request->l_a2,3);
        $l_d2= round(($l_c2/$request->l_a2) * $per,3);
        
        // dd($l_d2);
        $l_a3= $request->l_a3;
        $l_b3= $request->l_b3;
        $l_c3= round($request->l_b3 - $request->l_a3,3);
        $l_d3= round(($l_c3/$request->l_a3) * $per,3);
        // end Length 

        // Width 
        $per = 100;
        $w_a1= $request->w_a1;
        $w_b1= $request->w_b1;
        $w_c1= round($request->w_b1 - $request->w_a1,3);
        $w_d1= round(($w_c1/$request->w_a1) * $per,3);

        $w_a2= $request->w_a2;
        $w_b2= $request->w_b2;
        $w_c2= round($request->w_b2 - $request->w_a2,3);
        $w_d2= round(($w_c2/$request->w_a2) * $per,3);
        
        
        $w_a3= $request->w_a3;
        $w_b3= $request->w_b3;
        $w_c3= round($request->w_b3 - $request->w_a3,3);
        $w_d3= round(($w_c3/$request->w_a3) * $per,3);
        // end Width 

        $e = round(($request->l_a1 + $request->l_a2 + $request->l_a3) / 3,2) ;
        $f = round(($request->l_b1 + $request->l_b2 + $request->l_b3) / 3,2) ;
        $g = round(($f - $e) / $e * $per,2);
        $h = round(($request->w_a1 + $request->w_a2 + $request->w_a3) / 3,2) ;
        $i = round(($request->w_b1 + $request->w_b2 + $request->w_b3) / 3,2) ;
        $j = round(($i - $h) / $h * $per,2);

        // dd($firs_id);
        $input = [
            'firs_id' => $request->firs_id,
            'l_a1' => $request->l_a1,
            'l_a2' => $request->l_a2,
            'l_a3' => $request->l_a3,
            'l_b1' => $request->l_b1,
            'l_b2' => $request->l_b2,
            'l_b3' => $request->l_b3,
            'l_c1' => $l_c1,
            'l_c2' => $l_c2,
            'l_c3' => $l_c3,
            'l_d1' => $l_d1,
            'l_d2' => $l_d2,
            'l_d3' => $l_d3,
            'w_a1' => $request->w_a1,
            'w_a2' => $request->w_a2,
            'w_a3' => $request->w_a3,
            'w_b1' => $request->w_b1,
            'w_b2' => $request->w_b2,
            'w_b3' => $request->w_b3,
            'w_c1' => $w_c1,
            'w_c2' => $w_c2,
            'w_c3' => $w_c3,
            'w_d1' => $w_d1,
            'w_d2' => $w_d2,
            'w_d3' => $w_d3,
            'e' => $e,
            'f' => $f,
            'g' => $g,
            'h' => $h,
            'i' => $i,
            'j' => $j,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        //  dd($input);
        return $input;
    }

    public function lab($request)
    {
        if($request->shading_rat == null){
            $shading = "P";
        }else{
            $shading = $request->shading_rat;
        }

        if($request->shrin_rat == null){
            $shrin = "P";
        }else{
            $shrin = $request->shrin_rat;
        }

        if($request->torque_rat == null){
            $torque = "P";
        }else{
            $torque = $request->torque_rat;
        }

        if($request->twisting_rat == null){
            $twisting = "P";
        }else{
            $twisting = $request->twisting_rat;
        }

        if($request->color_rat == null){
            $color = "P";
        }else{
            $color = $request->color_rat;
        }

        if($request->fast_rat == null){
            $fast = "P";
        }else{
            $fast = $request->fast_rat;
        }

        $input = [
            'firs_id' => $request->firs_id,
            'shading_t' => $request->shading_t,
            'shading_l' => $request->shading_l,
            'shading_w' => $request->shading_w,
            'shading_rat' => $shading,
            'shrin_t' => $request->shrin_t,
            'shrin_l1' => $request->shrin_l1,
            'shrin_l2' => $request->shrin_l2,
            'shrin_lper' => $request->shrin_lper,
            'shrin_w1' => $request->shrin_w1,
            'shrin_w2' => $request->shrin_w2,
            'shrin_wper' => $request->shrin_wper,
            'shrin_rat' => $shrin,
            'torque_t' => $request->torque_t,
            'torque_b' => $request->torque_b,
            'torque_s' => $request->torque_s,
            'torque_man' => $request->torque_man,
            'torque_rat' => $torque,
            'twisting_t' => $request->twisting_t,
            'twisting_man' => $request->twisting_man,
            'twisting_rat' => $twisting,
            'color_t' => $request->color_t,
            'color_ace' => $request->color_ace,
            'color_poly' => $request->color_poly,
            'color_cot' => $request->color_cot,
            'color_acry' => $request->color_acry,
            'color_ny' => $request->color_ny,
            'color_woll' => $request->color_woll,
            'color_rat' => $color,
            'fast_t' => $request->fast_t,
            'fast_man' => $request->fast_man,
            'fast_rat' => $fast,
            'note' => $request->note,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
        return $input;
    }
}