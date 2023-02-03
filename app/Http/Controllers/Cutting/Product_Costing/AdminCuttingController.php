<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use App\JdeApi;
use App\Branch;
use App\KodeSize;
use App\WOBreakDown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\GelaranWo;
use App\Models\Cutting\Product_Costing\CuttingPPIC;
use App\Models\Cutting\Product_Costing\Assortmarker;
use App\Models\Cutting\Product_Costing\PemakaianKain;
use App\Services\Production\ProductCosting\data_ppic;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class AdminCuttingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function color(Request $request)
   {
    //    dd($request->ID);
      $data = WOBreakDown::where('F560020_DOCO', $request->ID)->get();
      $data_color = collect($data)
                        ->groupBy('F560020_SEG4')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
      // dd($data_color);
      return response()->json($data_color);
   }

   public function data_ppic($id)
   {
      $data = CuttingPPIC::where('no_wo', $id)->first();
      return response()->json($data);
   }

   public function component(Request $request)
   {
      $result = CuttingComponentPPIC::where('no_wo', $request->ID)->get();
      
      return response()->json($result);
   }

   public function size(Request $request)
   {
      // dd($request->ID);
      $data_coba = explode("|",$request->ID);
      // dd($data_coba);

      // $wo = preg_replace("/[^0-9]/", "",$request->ID);
      $wo = preg_replace("/[^0-9]/", "",$data_coba[1]);

      // $color = preg_replace('/[^\\/\-a-z\s]/i', '',$request->ID);
      $color = $data_coba[0];

      $data = WOBreakDown::where('F560020_DOCO', $wo)
                        ->where('F560020_SEG4', $color)
                        ->get();
      // dd($data);
      $data_size = [];
      foreach ($data as $key => $value) {
         // dd($value->F560020_SIZE55);
         $cek_size =  KodeSize::where('F0005_KY', $value->F560020_SIZE55)->count('F0005_KY');
         if ($cek_size != 0) {
            $size = KodeSize::where('F0005_KY', $value->F560020_SIZE55)->first();
         }else {
            $size_spasi = '      '.$value->F560020_SIZE55;
            $size = KodeSize::where('F0005_KY', $size_spasi)->first();
         }
         if ($size != null) {
            $ukuran = $size->F0005_DL01;
         }else {
            $ukuran = $value->F560020_SIZE55;
         }
         $data_size[] = [
            'quantity' => round($value->F560020_QTY),
            'size' => $ukuran,
            'color' => $value->F560020_SEG4,
         ];
      }

      $pembeda =  GelaranWo::where('no_wo', $wo)->where('color',$color)->count();
      if ($pembeda == 0) {
         return response()->json($data_size);
      }else {
         $geralan_wo = GelaranWo::where('no_wo', $wo)->where('color',$color)->get();
         $size = GelaranWo::where('no_wo', $wo)->where('color',$color)->first();
         // Quantity 
            $qty1 = collect($geralan_wo)->sum('qty1');
            $qty2 = collect($geralan_wo)->sum('qty2');
            $qty3 = collect($geralan_wo)->sum('qty3');
            $qty4 = collect($geralan_wo)->sum('qty4');
            $qty5 = collect($geralan_wo)->sum('qty5');
            $qty6 = collect($geralan_wo)->sum('qty6');
            $qty7 = collect($geralan_wo)->sum('qty7');
            $qty8 = collect($geralan_wo)->sum('qty8');
            $qty9 = collect($geralan_wo)->sum('qty9');
            $qty10 = collect($geralan_wo)->sum('qty10');
            $qty11 = collect($geralan_wo)->sum('qty11');
            $qty12 = collect($geralan_wo)->sum('qty12');
            $qty13 = collect($geralan_wo)->sum('qty13');
            $qty14 = collect($geralan_wo)->sum('qty14');
            $qty15 = collect($geralan_wo)->sum('qty15');
         // End 
         $coba = [
            [
               'size' => $size->size1,
               'qty' => $qty1,
            ],
            [
               'size' => $size->size2,
               'qty' => $qty2,
            ],
            [
               'size' => $size->size3,
               'qty' => $qty3,
            ],
            [
               'size' => $size->size4,
               'qty' => $qty4,
            ],
            [
               'size' => $size->size5,
               'qty' => $qty5,
            ],
            [
               'size' => $size->size6,
               'qty' => $qty6,
            ],
            [
               'size' => $size->size7,
               'qty' => $qty7,
            ],
            [
               'size' => $size->size8,
               'qty' => $qty8,
            ],
            [
               'size' => $size->size9,
               'qty' => $qty9,
            ],
            [
               'size' => $size->size10,
               'qty' => $qty10,
            ],
            [
               'size' => $size->size11,
               'qty' => $qty11,
            ],
            [
               'size' => $size->size12,
               'qty' => $qty12,
            ],
            [
               'size' => $size->size13,
               'qty' => $qty13,
            ],
            [
               'size' => $size->size14,
               'qty' => $qty14,
            ],
            [
               'size' => $size->size15,
               'qty' => $qty15,
            ]
         ];
         // dd($coba);
         $hasil = [];
         foreach ($data_size as $key => $value) {
            $pengurangan = collect($coba)->where('size', $value['size'])->first();
            if ($pengurangan != null) {
               $qty = $value['quantity'] - $pengurangan['qty'];
            }else {
               $qty = $value['quantity'];
            }
            $hasil[] = [
               'size' => $value['size'],
               'quantity' => $qty,
               'color' => $value['color'],
            ];
         }
         return response()->json($hasil);
      }
   }

   public function gelaran_wo(Request $request)
   {
      // dd($request->all());
      $data = FormGelar::where('id', $request->form_id)->first();
      $form_id = $request->form_id;
      $data_coba = explode("|",$request->color);

      // dd($data);
      if ($data == null || $data->id != $form_id) {
         $input = [
            'id' => $form_id,
            'factory' => $request->factory,
            'date' => date('Y-m-d')
         ];
         FormGelar::create($input);
      }

      $wo = JdeApi::findorfail($request->no_wo);
      $item_number = $wo->F4801_ITM;      
      $warna = $data_coba[0];

      $kode_warna = "#|".$warna."|#";
      // dd($kode_warna);
      $infa = (new data_ppic)->infa($item_number, $form_id, $wo, $kode_warna);
      // dd($infa);
      if ($infa != null) {
         foreach ($infa as $key => $value) {
            PemakaianKain::create($value);
         }
      }

      $input_gelar = $request->all();
      $input_gelar['color'] = $data_coba[0];
      $input_gelar['total_qty'] = $request->qty1 + $request->qty2 + $request->qty3 + $request->qty4 +$request->qty5 +
                                  $request->qty6 + $request->qty7 + $request->qty8 + $request->qty9 + $request->qty10 +
                                  $request->qty11 +  $request->qty12 + $request->qty13 + $request->qty14 + $request->qty15;
      GelaranWo::create($input_gelar);

      return redirect()->route('cutting.admincutting');
   }

   public function adm_edit($id)
   {
      // dd($id);
      $page ='dashboard';
      $data = FormGelar::with('gelaran_wo', 'pemakaian_kain', 'assortmarker')->findorfail($id);
      // dd($data->pemakaian_kain);
      $data_gelaran = (new data_ppic)->data_gelaran($data);
      // dd($data_gelaran);
      $branch = Branch::where('kode_branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->first();
      // $wo = CuttingPPIC::where('factory', str_replace(" ","",$branch->kode_jde))->get();
      $wo = CuttingPPIC::all();
      // dd($wo);
      return view('production.cutting.product_costing.admin_cutting.edit', compact('branch', 'page', 'data', 'wo', 'data_gelaran'));
   }

   public function delete_fabric($id)
   {
      $data =  PemakaianKain::findorfail($id);
      $data->delete();
      return back();
   }

   public function update_kain(Request $request)
   {
      $id = $request->id;
      $update=[
         'color' => $request->color,
         'qty' => $request->qty,
         'consumption' => $request->consumption,
      ];
      // dd($update);
      PemakaianKain::whereId($id)->update($update);

      return back();
   }

   public function tambah_gelaran(Request $request)
   {
      // dd($request->all());
      $form_id = $request->form_id;
      $data = FormGelar::with('pemakaian_kain')->findorfail($form_id);
      $data_coba = explode("|",$request->color);

      $update_factory = [
         'factory' => $request->factory
      ];
      FormGelar::whereId($form_id)->update($update_factory);

      $wo = JdeApi::findorfail($request->no_wo);
      $item_number = $wo->F4801_ITM;

      $warna = $data_coba[0];
      // dd($warna);

      $kode_warna = "#|".$warna."|#";
      $infa = (new data_ppic)->infa($item_number, $form_id, $wo, $kode_warna);

      if ($infa != null) {
         foreach ($infa as $key => $value) {
            $cek = collect($data->pemakaian_kain)->where('no_wo', $value['no_wo'])
                     ->where('color', $value['color'])
                     ->where('qty', $value['qty'])
                     ->where('consumption', $value['consumption'])
                     ->count('id');
            if ($cek == 0) {
               PemakaianKain::create($value);
            }
         }
      }
      
      $input_gelar = $request->all();
      $input_gelar['color'] = $data_coba[0];
      $input_gelar['total_qty'] = $request->qty1 + $request->qty2 + $request->qty3 + $request->qty4 +$request->qty5 +
                                  $request->qty6 + $request->qty7 + $request->qty8 + $request->qty9 + $request->qty10 +
                                  $request->qty11 +  $request->qty12 + $request->qty13 + $request->qty14 + $request->qty15;
      // dd($input_gelar);
      GelaranWo::create($input_gelar);

      return back();
   }

   public function assortmarker(Request $request)
   {
      $input = $request->all();
      // dd($input);
      $data_assortmarker = (new data_ppic)->assortmarker($input);
      // dd($data_assortmarker);
      foreach ($data_assortmarker as $key => $value) {
         Assortmarker::create($value);
      }
      $update_form = (new data_ppic)->form($data_assortmarker, $input);
      // dd($update_form);
      FormGelar::whereId($request->form_id)->update($update_form);

      return back();
   }

   public function assort_update(Request $request)
   {
      // dd($request->all());
      $input = $request->all();
      // dd($input);
      $id = $request->id;
      $form = FormGelar::findorfail($request->form_id);
      // dd($form);

      $update = $request->all();
      // dd($update);
      Assortmarker::whereId($id)->update($update);

      $update_form = (new data_ppic)->form_update($form, $input);
      // dd($update_form);
      FormGelar::whereId($form->id)->update($update_form);
      
      return back();
   }

   public function add_assortmarker(Request $request)
   {
      // dd($request->all());
      $input = $request->all();
      $data_assortmarker = (new data_ppic)->assortmarker($input);
      foreach ($data_assortmarker as $key => $value) {
         Assortmarker::create($value);
      }
      $update_form = (new data_ppic)->form_input($input);
      // dd($update_form);
      FormGelar::create($update_form);
      // dd($update_form);
      return redirect()->route('cutting.admincutting');
   }

   public function assort_delete($id)
   {
      $data = Assortmarker::findorfail($id);
      $form = FormGelar::findorfail($data->form_id);
      // dd($data->qty);
      $update_form = [
         'total_ratio' => $form->total_ratio - $data->qty
      ];

      FormGelar::whereId($form->id)->update($update_form);

      $data->delete();
        
      return back();
   }

   public function assort_new(Request $request)
   {
      $input = $request->all();
      // dd($input);
      Assortmarker::create($input);

      $data = FormGelar::findorfail($request->form_id);
      $update = [
         'total_ratio' => $data->total_ratio + $request->qty
      ];

      FormGelar::whereId($data->id)->update($update);
      return back();
   }

   public function update_detail(Request $request)
   {
      $data = $request->all();
      // dd($data);
      $update = [
         'total_ratio' => $request->total_ratio,
         'panjang_marker' => $request->panjang_marker,
         'panjang_marker_actual' => $request->panjang_marker_actual,
         'lebar_marker' => $request->lebar_marker,
         'qty_lembar' => $request->qty_lembar,
         'factory' => $request->factory,
      ];
      // dd($update);
      FormGelar::whereId($request->id)->update($update);

      return redirect()->route('cutting.admincutting');
   }
}
