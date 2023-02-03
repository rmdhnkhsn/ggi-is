    <div class="row" style="margin-top:-10px">
    <!-- <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
    <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button> -->
        <div class="col-12 pb-5">
            <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable1" class="table tbl-content-12">
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Buyer</th>
                            <!-- <th>AVG</th> -->
                            <th>AVG</th>
                            <th>Style</th>
                            <th>Item</th>
                            @foreach($tanggal as $key1=>$value1)
                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;?>
                        @foreach($record_efisien as $key2=>$value2)
                        <?php
                        $no++;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$value2['branch']}}</td>
                            <td>{{$value2['line']}}</td>
                            <td>{{$value2['buyer']}}</td>
                            <!-- <td>{{$value2['average']}}</td> -->
                            <td>{{$value2['average_month']}}</td>
                            <td>{{$value2['style']}}</td>
                            <td>{{$value2['item']}}</td>
                            @foreach($tanggal as $key3=>$value3)
                            <?php
                            $collect=collect($data);
                            $check=$collect->where('fasilitas',$value2['branch'])->where('line',$value2['line'])
                                    ->where('style',$value2['style'])->where('tanggal',$value3['tanggal'])->count();
                            if($check>0){
                                $sum=collect($replace)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                ->where('fasilitas',$value2['branch'])
                                ->where('style',$value2['style'])
                                ->sum('act_line');
                                $count=collect($replace)->where('tanggal',$value3['tanggal'])->where('line',$value2['line'])
                                ->where('fasilitas',$value2['branch'])->where('style',$value2['style'])->count();
                                $jumlah_op=$op_hadir->where('branchdetail',$value2['branch'])->where('line',$value2['line'])
                                        ->where('style',$value2['style'])->where('tanggal',$value3['tanggal'])->first();
                                $nilai_smv=collect($smv)->where('style',$value2['style'])->where('fasilitas',$value2['branch'])->where('buyer',$value2['buyer'])->first();
                                    if($jumlah_op!=null && $nilai_smv!=null){
                                        // dd($nilai_smv['smv_total']);
                                        $average=($sum/$count*$nilai_smv['smv_total']*100)/($jumlah_op['total_operator']*$jumlah_op['waktu_smv']);
                                        $avg=number_format($average,2, "," , ".");

                                    }
                                    else{
                                        $avg='null';
                                    }
                            }
                            else{
                                $avg='-';
                            }
                            ?>
                                <th style="font-weight:400;text-align:left">{{$avg}}</th>
                            @endforeach
                           
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Buyer</th>
                            <!-- <th>AVG</th> -->
                            <th>AVG</th>
                            <th>Style</th>
                            <th>Item</th>
                            @foreach($tanggal as $key1=>$value1)
                                <th class="no-wrap">{{$value1['tanggal']}}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>