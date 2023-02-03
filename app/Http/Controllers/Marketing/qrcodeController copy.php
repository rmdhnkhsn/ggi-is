<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Branch;
use App\Bdetail;
use App\qrcodemodel;
use App\QrcodeUpdateHistory;
use App\Style;
use DataTables;
use Auth;
use PDF;
use DateTime;
use App\Services\Marketing\QrCodeSample\qrcodeSample;
use Svg\Tag\Rect;

class qrcodeController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $page = 'index';
          // get data semua aktif
        $data = qrcodemodel::orderBy('id','desc')->get();
        // dd($data->style);
        $dataPO = [];
        foreach ($data as $key => $value) {
         
        
        // dd($notif);  
        $date = $value->ppm_date ;  
        $now = \Carbon\Carbon::parse($date )->subDays(7)->diffForHumans(); 
            // dd($now);
            $dataPO[] = [
                'buyer' => $value->buyer,
                'style' => $value->style,
                'ppm_date' => $value->ppm_date,
                'ppm' => $value->ppm,
                'now' => $now,
                
            ];
            // dd($dataPO);
        }
        //  dd($dataPO);
        $date =date('Y-m-d');
        // dd($date);
        $notif = qrcodemodel ::where('ppm','=',null)->count('ppm_date');
        
        // dd($notif);
        // dd($now);


        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('foto', function($row){
                return view('production.qrcode.atribut.view_img', compact('row'));
            })
            ->addColumn('smv', function($row){
                return view('production.qrcode.atribut.btn_smv', compact('row'));
            })
            ->addColumn('ppm', function($row){
                return view('production.qrcode.atribut.btn_ppm', compact('row'));
            })
            ->addColumn('work', function($row){

                return view('production.qrcode.atribut.btn_work', compact('row'));
            })
            ->addColumn('trimcard', function($row){
                return view('production.qrcode.atribut.btn_trimcard', compact('row'));
            })
            ->addColumn('techspech', function($row){
                return view('production.qrcode.atribut.btn_techspech', compact('row'));
            })
            ->addColumn('ppm_date', function($row){
                return view('production.qrcode.atribut.btn_ppm_date', compact('row'));
            })
            ->addColumn('progress', function($row){
                $rowData = collect([
                    $row['smv'],
                    $row['ppm'],
                    $row['work'],
                    $row['trimcard'],
                    $row['techspech'],
                ]);
                $percentData = ($rowData->filter(function($item){ return $item !== null; })->count() / $rowData->count()) * 100;
                return view('production.qrcode.atribut.btn_progress', compact('percentData','rowData'));
            })
            ->addColumn('action', function($row){
                $rowData = collect([
                    $row['smv'],
                    $row['ppm'],
                    $row['work'],
                    $row['trimcard'],
                    $row['techspech'],
                    $row['ppm_date'],
                ]);
                $percentData = ($rowData->filter(function($item){ return $item !== null; })->count() / $rowData->count()) * 100;

                return view('production.qrcode.atribut.btn_action', compact('row', 'percentData'));
            })
            ->addColumn('smv', function($row){
                return view('production.qrcode.atribut.btn_smv', compact('row'));
            })
            ->rawColumns(['foto','smv','ppm','ppm_date','work','trimcard','techspech','progress','action','smv'])
           
            ->make(true);

        }
        $user_ppm = (new  qrcodeSample)->user_ppm();
        $data_notif = (new  qrcodeSample)->data_notif();
        $test = (new  qrcodeSample)->qrSample($user_ppm, $data_notif);
        // dd($test);
        // $bisa=(new qrcodeSample)->qrSample($user_ppm);
        
        return view('production.qrcode.index',compact('data_notif','test','notif','dataPO','data','page'));
    }
    public function create(Request $request)
    {
        $page = 'index';
        $data = qrcodemodel::all();

        return view('production/qrcode/add', compact('data','page'));
    }

    public function storeSmv(Request $request, qrcodemodel $qrcode)
    {
        $page = 'store';
        // dd($request->all());
        $validatedInput = $request->validate([
            'smv' => ['required', 'file', 'max:10000'],
        ]);

        return redirect()->back();
    }
    public function storePpm(Request $request, qrcodemodel $qrcode)
    {
        $page = 'store';
        $data = qrcodemodel::all();
        $validatedInput = $request->validate([
            'ppm' =>['required', 'file', 'max:10000'],

        ]);

        return redirect()->back();
    }
    public function storeWork(Request $request, qrcodemodel $qrcode)
    {
        $page = 'store';
        $data = qrcodemodel::all();
        $validatedInput = $request->validate([
            'work' =>['required', 'file', 'max:10000'],

        ]);
        return view('production/qrcode/addWork', compact('data','page'));
    }
    public function storeTechspech(Request $request, qrcodemodel $qrcode)
    {
        $page = 'store';
        $data = qrcodemodel::all();
        $validatedInput = $request->validate([
            'techspech' =>['required', 'file', 'max:10000'],

        ]);
        return view('production/qrcode/addTechspech', compact('data','page'));
    }
    public function storeTrimcard(Request $request, qrcodemodel $qrcode)
    {
        $page = 'store';
        $data = qrcodemodel::all();
        $validatedInput = $request->validate([
            'trimcard   ' =>['required', 'file', 'max:10000'],

        ]);
        return view('production/qrcode/addTrimcard', compact('data','page'));
    }

    public function updateSmv1(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            //maksimal PDF 10 MB
            'smv' => ['required', 'file', 'max:10000'],
        ]);

        tap($validatedInput['smv'], function ($previous) use($validatedInput, $qrcode) {
            $fileNamesmv = $validatedInput['smv']->getClientOriginalName();
            $fileNamesmv = substr($fileNamesmv, strpos($fileNamesmv, '.c'));
            $fileNamesmv = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNamesmv;

            // dd($validatedInput['smv']->storePubliclyAs('qrcode/smv', $fileNamesmv, ['disk' => 'public']), $ubah);
            $qrcode->update([
                'smv' => $validatedInput['smv']->storePubliclyAs('qrcode/smv', $fileNamesmv, ['disk' => 'public']),
                'updated_at_smv' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updatePpm1(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            'ppm' => ['required', 'file', 'max:10000'], //maksimal PDF 10 MB
        ]);
        // dd($validatedInput, $qrcode);

        tap($validatedInput['ppm'], function ($previous) use($validatedInput, $qrcode) {
            $fileNameppm = $validatedInput['ppm']->getClientOriginalName();
            $fileNameppm = substr($fileNameppm, strpos($fileNameppm, '.c'));
            $fileNameppm = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNameppm;

            $qrcode->update([
                'ppm' => $validatedInput['ppm']->storePubliclyAs('qrcode/ppm', $fileNameppm, ['disk' => 'public']),
                'updated_at_ppm' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }
    public function updateWork1(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            //maksimal PDF 10 MB
            'work' => ['required', 'file', 'max:10000'],
        ]);

        tap($validatedInput['work'], function ($previous) use($validatedInput, $qrcode) {
            $fileNamework = $validatedInput['work']->getClientOriginalName();
            $fileNamework = substr($fileNamework, strpos($fileNamework, '.c'));
            $fileNamework = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNamework;

            // dd($validatedInput['work']->storePubliclyAs('qrcode/work', $fileNamework, ['disk' => 'public']), $ubah);
            $qrcode->update([
                'work' => $validatedInput['work']->storePubliclyAs('qrcode/work', $fileNamework, ['disk' => 'public']),
                'updated_at_work' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateTrimcard1(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            'trimcard' => ['required', 'file', 'max:10000'], //maksimal PDF 10 MB
        ]);

        tap($validatedInput['trimcard'], function ($previous) use($validatedInput, $qrcode) {
            $fileNametrimcard = $validatedInput['trimcard']->getClientOriginalName();
            $fileNametrimcard = substr($fileNametrimcard, strpos($fileNametrimcard, '.c'));
            $fileNametrimcard = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNametrimcard;

            $qrcode->update([
                'trimcard' => $validatedInput['trimcard']->storePubliclyAs('qrcode/trimcard', $fileNametrimcard, ['disk' => 'public']),
                'updated_at_trimcard' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateTechspech1(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
       $validatedInput = $request->validate([
            'techspech' => ['required', 'file', 'max:10000'], //maksimal PDF 10 MB

        ]);
        // dd($validatedInput, $qrcode);

        tap($validatedInput['techspech'], function ($previous) use($validatedInput, $qrcode) {
            $fileNametechspech = $validatedInput['techspech']->getClientOriginalName();
            $fileNametechspech = substr($fileNametechspech, strpos($fileNametechspech, '.c'));
            $fileNametechspech = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNametechspech;

            // dd($validatedInput['techspech']->storePubliclyAs('qrcode/techspech', $fileNametechspech, ['disk' => 'public']), $ubah);
            $qrcode->update([
                'techspech' => $validatedInput['techspech']->storePubliclyAs('qrcode/techspech', $fileNametechspech, ['disk' => 'public']),
                'updated_at_techspech' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateSmv(Request $request, qrcodemodel $qrcode)
    {
       
        $page = 'update';

        $validatedInput = $request->validate([
            'smv' => ['required', 'file', 'max:2048'],
            'remark_smv' => ['required', 'string', 'max:255'],
        ]);

        $qrcode->qrcode_update_history()->save(
            new QrcodeUpdateHistory([
                'type' => 'smv',
                'created_by' => Auth::user()->nama,
                'remark' => $validatedInput['remark_smv'],
            ])
        );

        tap($validatedInput['smv'], function ($previous) use($validatedInput, $qrcode) {
            $fileNameSmv = $validatedInput['smv']->getClientOriginalName();
            $fileNameSmv = substr($fileNameSmv, strpos($fileNameSmv, '.c'));
            $fileNameSmv = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNameSmv;

            $qrcode->update([
                'smv' => $validatedInput['smv']->storePubliclyAs('qrcode/smv', $fileNameSmv, ['disk' => 'public']),
                'updated_at_smv' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

     public function updatePpm(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            'ppm' => ['required', 'file', 'max:10000'], //maksimal PDF 10 MB
            'remark_ppm' => ['required', 'string', 'max:255'],
        ]);

        $qrcode->qrcode_update_history()->save(
            new QrcodeUpdateHistory([
                'type' => 'ppm',
                'created_by' => Auth::user()->nama,
                'remark' => $validatedInput['remark_ppm'],
            ])
        );


        tap($validatedInput['ppm'], function ($previous) use($validatedInput, $qrcode) {
            $fileNameppm = $validatedInput['ppm']->getClientOriginalName();
            $fileNameppm = substr($fileNameppm, strpos($fileNameppm, '.c'));
            $fileNameppm = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNameppm;

            $qrcode->update([
                'ppm' => $validatedInput['ppm']->storePubliclyAs('qrcode/ppm', $fileNameppm, ['disk' => 'public']),
                'updated_at_ppm' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateWork(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
        $validatedInput = $request->validate([
            //maksimal PDF 10 MB
            'work' => ['required', 'file', 'max:10000'],
            'remark_work' => ['required', 'string', 'max:255'],
        ]);

        $qrcode->qrcode_update_history()->save(
            new QrcodeUpdateHistory([
                'type' => 'worksheet',
                'created_by' => Auth::user()->nama,
                'remark' => $validatedInput['remark_work'],
            ])
        );

        tap($validatedInput['work'], function ($previous) use($validatedInput, $qrcode) {
            $fileNamework = $validatedInput['work']->getClientOriginalName();
            $fileNamework = substr($fileNamework, strpos($fileNamework, '.c'));
            $fileNamework = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNamework;

            // dd($validatedInput['work']->storePubliclyAs('qrcode/work', $fileNamework, ['disk' => 'public']), $ubah);
            $qrcode->update([
                'work' => $validatedInput['work']->storePubliclyAs('qrcode/work', $fileNamework, ['disk' => 'public']),
                'updated_at_work' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateTrimcard(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
       $validatedInput = $request->validate([
            'trimcard' => ['required', 'file', 'max:10000'], 
            'remark_trimcard' => ['required', 'string', 'max:255'],
        ]);

        $qrcode->qrcode_update_history()->save(
            new QrcodeUpdateHistory([
                'type' => 'trimcard',
                'created_by' => Auth::user()->nama,
                'remark' => $validatedInput['remark_trimcard'],
            ])
        );

        tap($validatedInput['trimcard'], function ($previous) use($validatedInput, $qrcode) {
            $fileNametrimcard = $validatedInput['trimcard']->getClientOriginalName();
            $fileNametrimcard = substr($fileNametrimcard, strpos($fileNametrimcard, '.c'));
            $fileNametrimcard = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNametrimcard;

            $qrcode->update([
                'trimcard' => $validatedInput['trimcard']->storePubliclyAs('qrcode/trimcard', $fileNametrimcard, ['disk' => 'public']),
                'updated_at_trimcard' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function updateTechspech(Request $request, qrcodemodel $qrcode)
    {
        $page = 'update';
       $validatedInput = $request->validate([
            'techspech' => ['required', 'file', 'max:10000'],
            'remark_techpack' => ['required', 'string', 'max:255'],
        ]);

        $qrcode->qrcode_update_history()->save(
            new QrcodeUpdateHistory([
                'type' => 'techpack',
                'created_by' => Auth::user()->nama,
                'remark' => $validatedInput['remark_techpack'],
            ])
        );

        tap($validatedInput['techspech'], function ($previous) use($validatedInput, $qrcode) {
            $fileNametechspech = $validatedInput['techspech']->getClientOriginalName();
            $fileNametechspech = substr($fileNametechspech, strpos($fileNametechspech, '.c'));
            $fileNametechspech = $qrcode->style.'_'.$qrcode->buyer.'_'.date("d M Y").'_'.$fileNametechspech;
            $qrcode->update([
                'techspech' => $validatedInput['techspech']->storePubliclyAs('qrcode/techspech', $fileNametechspech, ['disk' => 'public']),
                'updated_at_techspech' => now(),
            ]);

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $page = 'store';

        //upload image
        $request->validate([
            'style' => ['required'],
            'buyer' => ['required'],
            'ppm_date' => ['required'],
        ]);

        if(isset($request->foto)){
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, strpos($fileName, '.c'));
            $fileName = $request->style.'_'.$request->buyer.'_'.date("d M Y").$fileName;
            $tujuan_upload = 'qrcode/img';

            $fileName = $request->foto->storePubliclyAs(
                $tujuan_upload, $fileName, ['disk' => 'public']
            );
        }

        if(isset($request->smv)){
            $file = $request->file('smv');
            $fileNameSmv = $file->getClientOriginalName();
            $fileNameSmv = substr($fileNameSmv, strpos($fileNameSmv, '.c'));
            $fileNameSmv = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameSmv;

            $fileNameSmv = $request->smv->storePubliclyAs(
                'qrcode/smv', $fileNameSmv, ['disk' => 'public']
            );
        }

        if(isset($request->ppm)){
            $file = $request->file('ppm');
            $fileNameppm = $file->getClientOriginalName();
            $fileNameppm = substr($fileNameppm, strpos($fileNameppm, '.c'));
            $fileNameppm = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameppm;

            $request->ppm->storePubliclyAs(
                'qrcode/ppm', $fileNameppm, ['disk' => 'public']
            );

            $fileNameppm = 'qrcode/ppm/' . $fileNameppm;
        }

        if(isset($request->work)){
            $file = $request->file('work');
            $fileNamework = $file->getClientOriginalName();
            $fileNamework = substr($fileNamework, strpos($fileNamework, '.c'));
            $fileNamework = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNamework;

            $request->work->storePubliclyAs(
                'qrcode/work', $fileNamework, ['disk' => 'public']
            );

            $fileNamework = 'qrcode/work/' . $fileNamework;
        }

        if(isset($request->trimcard)){
            $file = $request->file('trimcard');
            $fileNametrimcard = $file->getClientOriginalName();
            $fileNametrimcard = substr($fileNametrimcard, strpos($fileNametrimcard, '.c'));
            $fileNametrimcard = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametrimcard;

            $request->trimcard->storePubliclyAs(
                'qrcode/trimcard', $fileNametrimcard, ['disk' => 'public']
            );

            $fileNametrimcard = 'qrcode/trimcard/' . $fileNametrimcard;
        }

        if(isset($request->techspech)){
            $file = $request->file('techspech');
            $fileNametechspech = $file->getClientOriginalName();
            $fileNametechspech = substr($fileNametechspech, strpos($fileNametechspech, '.c'));
            $fileNametechspech = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametechspech;

            $request->techspech->storePubliclyAs(
                'qrcode/techspech', $fileNametechspech, ['disk' => 'public']
            );

            $fileNametechspech = 'qrcode/techspech/' . $fileNametechspech;
        }

        $data = [
            'id' => $request->id,
			'style' => $request->style,
            'buyer' => $request->buyer,
            'ppm_date' => $request->ppm_date,
            'foto'=> $fileName ?? null,
            'smv' => $fileNameSmv ?? null,
            'ppm' => $fileNameppm ?? null,
            'work' =>$fileNamework ?? null,
            'trimcard' => $fileNametrimcard ?? null,
            'techspech' => $fileNametechspech ?? null,
            'updated_at_smv' => now(),
            'updated_at_ppm' => now(),
            'updated_at_work' => now(),
            'updated_at_trimcard' => now(),
            'updated_at_techspech' => now(),
        ];

        $store = qrcodemodel::create($data);

        // $update = ['id' => 1,];
        // qrcodemodel::whereId($request->smv)->update($update);

        return redirect()->route('qrcode.index')->with('success', 'Success');
    }

    public function edit($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production/qrcode/edit-data', compact('data','page'));
    }

    public function editPdf($id)
    {
        $page = 'edit';
        $data = qrcodemodel::findOrFail($id);
        //   dd($data);
        return view('production/qrcode/edit-pdf', compact('data','page'));

    }
    public function notif($id)
    {
        $page = 'edit';
        $data = qrcodemodel::findOrFail($id);
        //   dd($data);
        return view('production/qrcode/notif', compact('data','page'));

    }

    public function view_ppm($id)
    {
        $page = 'edit';
        $data = qrcodemodel::findOrFail($id);

        return view('production/qrcode/atribur/view_ppm', compact('data','page'));

    }

    public function update(Request $request, $id)
    {
        $page = 'update';
        $ubah = qrcodemodel::findOrFail($id);
        $awal = $ubah->foto;
        $smv = $ubah->smv;
        $ppm = $ubah->ppm;
        $work = $ubah->work;
        $trimcard = $ubah->trimcard;
        $techspech = $ubah->techspech;

        $data = [
            'buyer'   => $request['buyer'],
            'style'  => $request['style'],
            'foto'      => $awal,
            'smv'      => $smv,
            'ppm'      => $ppm,
            'work'      => $work,
            'trimcard'      => $trimcard,
            'techspech'      => $techspech,
        ];
        $ubah->update($data);
        if (isset($request->foto)) {
            tap($ubah->foto, function ($previous) use($request, $ubah) {
                $fileNameFoto = $request->foto->getClientOriginalName();
                $fileNameFoto = substr($fileNameFoto, strpos($fileNameFoto, '.c'));
                $fileNameFoto = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameFoto;

                $ubah->update([
                    'foto' => $request->foto->storePubliclyAs('qrcode/img', $fileNameFoto, ['disk' => 'public']),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }
        if (isset($request->smv)) {
            tap($ubah->smv, function ($previous) use($request, $ubah) {
                $fileNameSmv = $request->smv->getClientOriginalName();
                $fileNameSmv = substr($fileNameSmv, strpos($fileNameSmv, '.c'));
                $fileNameSmv = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameSmv;

                $ubah->update([
                    'smv' => $request->smv->storePubliclyAs('qrcode/smv', $fileNameSmv, ['disk' => 'public']),
                    'updated_at_smv' => now(),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        if (isset($request->ppm)) {
            tap($ubah->ppm, function ($previous) use($request, $ubah) {
                $fileNameppm = $request->ppm->getClientOriginalName();
                $fileNameppm = substr($fileNameppm, strpos($fileNameppm, '.c'));
                $fileNameppm = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameppm;

                $ubah->update([
                    'ppm' => $request->ppm->storePubliclyAs('qrcode/ppm', $fileNameppm, ['disk' => 'public']),
                    'updated_at_ppm' => now(),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        if (isset($request->work)) {
            tap($ubah->work, function ($previous) use($request, $ubah) {
                $fileNamework = $request->work->getClientOriginalName();
                $fileNamework = substr($fileNamework, strpos($fileNamework, '.c'));
                $fileNamework = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNamework;

                $ubah->update([
                    'work' => $request->work->storePubliclyAs('qrcode/work', $fileNamework, ['disk' => 'public']),
                    'updated_at_work' => now(),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        if (isset($request->trimcard)) {
            tap($ubah->trimcard, function ($previous) use($request, $ubah) {
                $fileNametrimcard = $request->trimcard->getClientOriginalName();
                $fileNametrimcard = substr($fileNametrimcard, strpos($fileNametrimcard, '.c'));
                $fileNametrimcard = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametrimcard;

                $ubah->update([
                    'trimcard' => $request->trimcard->storePubliclyAs('qrcode/trimcard', $fileNametrimcard, ['disk' => 'public']),
                    'updated_at_trimcard' => now(),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        if (isset($request->techspech)) {
            tap($ubah->techspech, function ($previous) use($request, $ubah) {
                $fileNametechspech = $request->techspech->getClientOriginalName();
                $fileNametechspech = substr($fileNametechspech, strpos($fileNametechspech, '.c'));
                $fileNametechspech = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametechspech;

                $ubah->update([
                    'techspech' => $request->techspech->storePubliclyAs('qrcode/techspech', $fileNametechspech, ['disk' => 'public']),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }
      return redirect()->route('qrcode.index')->with('success', 'Success');

    }

    public function updatePpmDate(Request $request, qrcodemodel $qrcodemodel)
    {
        $validatedData = $request->validate([
            "ppm_date" => ['required', 'date']
        ]);

        $qrcodemodel->update($validatedData);

        return back();
    }

    public function show($id)
    {
        $page = 'show';

        $data = qrcodemodel::findOrFail($id)
            ->load(['qrcode_update_history']);

        return view('production.qrcode.detail', compact('data','page'));
    }
    public function show_smv($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production.qrcode.detail_smv', compact('data','page'));
    }
    public function show_trimcard($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production.qrcode.detail_trimcard', compact('data','page'));
    }
    public function show_ppm($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production.qrcode.detail_ppm', compact('data','page'));
    }
    public function show_work($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production.qrcode.detail_work', compact('data','page'));
    }
    public function show_techspech($id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);

        return view('production.qrcode.detail_techspech', compact('data','page'));
    }

    public function delete($id)
    {
        $data = qrcodemodel::findOrFail($id);
        Storage::disk('public')->delete($data->smv);
        Storage::disk('public')->delete($data->ppm);
        Storage::disk('public')->delete($data->work);
        Storage::disk('public')->delete($data->trimcard);
        Storage::disk('public')->delete($data->techspech);
        $data->delete();

        return back();
    }

    public function generate (Request $request, $id)
    {
        $page = 'index';
        $data = qrcodemodel::findOrFail($id);
        $qrcode = QrCode::size(200)->generate("https://gcc.gistexgarmenindonesia.com:7186/mkt/qrcode/show/{$id}");
        return view('production.qrcode.qrcode', compact('data','qrcode','page', 'id'));
    }

    public function generateQrcode (Request $request, $id)
    {
        $data = qrcodemodel::findOrFail($id);

        $qrcode2 = QrCode::size(200)->generate("https://gcc.gistexgarmenindonesia.com:7186/mkt/qrcode/show/{$id}");

        $headers = array('Content-Type' => ['png','svg','eps']);
        $type = 'png';
        $image = \QrCode::format($type)
            ->style('round')
            ->margin(3)
            ->size(200)
            ->errorCorrection('H')
            ->merge('http://www.google.com/someimage.png', .3, true)
            ->generate("http://10.8.0.108/production/qrcode/show/{$id}");

        $imageName = 'QrCode-'.$data->id;
        if ($type == 'svg') {
            $svgTemplate = new \SimpleXMLElement($image);
            $svgTemplate->registerXPathNamespace('svg', 'https://gcc.gistexgarmenindonesia.com:7186/mkt/qrcode/show/{$id}');
            $svgTemplate->rect->addAttribute('fill-opacity', 0);
            $image = $svgTemplate->asXML();
        }

        $pathFile = 'qrcode/qr-code/'.$imageName.'.'.$type;
        if (\Storage::disk('public')->exists($pathFile)) {
            \Storage::disk('public')->delete($pathFile);
        }
        \Storage::disk('public')->put($pathFile, $image);

        return response()->download('storage/qrcode/qr-code/'.$imageName.'.'.$type, $imageName.'.'.$type, $headers);
    }

     public function pdf($id){
        //  dd($id);
        $page = 'pdf';
        $data = qrcodemodel::findOrFail($id);
        $qrcode =  base64_encode(QrCode::size(200)->errorCorrection('H')->generate("https://gcc.gistexgarmenindonesia.com:7186/mkt/qrcode/show/{$id}"));
         $pdf = PDF::loadview('production/qrcode/laporan', compact('data','page', 'id', 'qrcode'))->setPaper('A5','potrait');
        return $pdf->stream('qr-code.pdf');
    }

}
